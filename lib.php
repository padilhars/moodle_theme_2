<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Theme UFPel - Library functions (Moodle 5.x Compatible)
 *
 * @package    theme_ufpel
 * @copyright  2025 Your Organization
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Returns the main SCSS content for the theme.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_ufpel_get_main_scss_content($theme) {
    global $CFG;

    $scss = '';
    
    try {
        // Pre CSS - before the preset.
        $prescss = theme_ufpel_get_pre_scss($theme);
        
        // Get the preset.
        $preset = theme_ufpel_get_preset_scss($theme);
        
        // Post CSS - after the preset.
        $postcss = theme_ufpel_get_post_scss($theme);
        
        // Combine them together.
        $scss = $prescss . "\n" . $preset . "\n" . $postcss;
        
    } catch (Exception $e) {
        // Log error and fallback to Boost default.
        error_log('theme_ufpel SCSS compilation error: ' . $e->getMessage());
        
        // Fallback to Boost default preset.
        $fallbackfile = $CFG->dirroot . '/theme/boost/scss/preset/default.scss';
        if (file_exists($fallbackfile) && is_readable($fallbackfile)) {
            $scss = file_get_contents($fallbackfile);
        }
    }
    
    return $scss;
}

/**
 * Returns the pre SCSS for the theme.
 * 
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_ufpel_get_pre_scss($theme) {
    $scss = '';
    
    try {
        // Check if pre.scss file exists and is readable.
        $prescssfile = __DIR__ . '/scss/pre.scss';
        if (file_exists($prescssfile) && is_readable($prescssfile)) {
            $scss .= file_get_contents($prescssfile);
        }
        
        // Add any custom pre scss from settings.
        if (!empty($theme->settings->scsspre)) {
            $scss .= "\n" . $theme->settings->scsspre;
        }
        
    } catch (Exception $e) {
        error_log('theme_ufpel pre SCSS error: ' . $e->getMessage());
    }
    
    return $scss;
}

/**
 * Returns the main SCSS preset for the theme.
 * 
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_ufpel_get_preset_scss($theme) {
    global $CFG;
    
    $scss = '';
    
    try {
        // Default to Boost's default.scss.
        $preset = 'default.scss';
        
        // Check if a preset is selected in settings.
        if (!empty($theme->settings->preset)) {
            $preset = $theme->settings->preset;
        }
        
        // First, try to load from our own preset directory.
        $ufpelpresetfile = __DIR__ . '/scss/preset/' . $preset;
        if (file_exists($ufpelpresetfile) && is_readable($ufpelpresetfile)) {
            $scss = file_get_contents($ufpelpresetfile);
        } else {
            // Fallback to Boost presets for standard options.
            $allowedboostpresets = ['default.scss', 'plain.scss'];
            
            if (in_array($preset, $allowedboostpresets)) {
                $boostpresetfile = $CFG->dirroot . '/theme/boost/scss/preset/' . $preset;
                if (file_exists($boostpresetfile) && is_readable($boostpresetfile)) {
                    $scss = file_get_contents($boostpresetfile);
                }
            }
        }
        
        // Final fallback to Boost default if nothing loaded.
        if (empty($scss)) {
            $defaultfile = $CFG->dirroot . '/theme/boost/scss/preset/default.scss';
            if (file_exists($defaultfile) && is_readable($defaultfile)) {
                $scss = file_get_contents($defaultfile);
            }
        }
        
    } catch (Exception $e) {
        error_log('theme_ufpel preset SCSS error: ' . $e->getMessage());
        
        // Emergency fallback.
        $defaultfile = $CFG->dirroot . '/theme/boost/scss/preset/default.scss';
        if (file_exists($defaultfile) && is_readable($defaultfile)) {
            $scss = file_get_contents($defaultfile);
        }
    }
    
    return $scss;
}

/**
 * Returns the post SCSS for the theme.
 * 
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_ufpel_get_post_scss($theme) {
    $scss = '';
    
    try {
        // Check if post.scss file exists and is readable.
        $postscssfile = __DIR__ . '/scss/post.scss';
        if (file_exists($postscssfile) && is_readable($postscssfile)) {
            $scss .= file_get_contents($postscssfile);
        }
        
        // Add any custom scss from settings.
        if (!empty($theme->settings->scss)) {
            $scss .= "\n" . $theme->settings->scss;
        }
        
    } catch (Exception $e) {
        error_log('theme_ufpel post SCSS error: ' . $e->getMessage());
    }
    
    return $scss;
}

/**
 * Serves any files associated with the theme settings.
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param context $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @param array $options
 * @return bool
 */
function theme_ufpel_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array()) {
    
    // Validate context.
    if ($context->contextlevel !== CONTEXT_SYSTEM) {
        return false;
    }
    
    // Validate filearea.
    $allowedfileareas = ['preset', 'logo', 'backgroundimage'];
    if (!in_array($filearea, $allowedfileareas)) {
        return false;
    }
    
    // Validate arguments.
    if (empty($args)) {
        return false;
    }
    
    // Extract file info safely.
    $itemid = (int) array_shift($args);
    if (empty($args)) {
        return false;
    }
    
    $filename = array_pop($args);
    if (empty($filename)) {
        return false;
    }
    
    // Extract the filepath.
    $filepath = empty($args) ? '/' : '/' . implode('/', $args) . '/';
    
    // Get file from storage.
    $fs = get_file_storage();
    $file = $fs->get_file($context->id, 'theme_ufpel', $filearea, $itemid, $filepath, $filename);
    
    if (!$file || $file->is_directory()) {
        return false;
    }
    
    // Security: Check file type for certain fileareas.
    if ($filearea === 'preset') {
        $allowedextensions = ['scss', 'css'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array(strtolower($extension), $allowedextensions)) {
            return false;
        }
    }
    
    // Send the file with appropriate caching.
    $lifetime = $filearea === 'preset' ? 0 : 86400; // No cache for presets, 1 day for others.
    send_stored_file($file, $lifetime, 0, $forcedownload, $options);
    
    return true;
}

/**
 * Get theme configuration for UFPel theme.
 * 
 * @param theme_config $theme The theme config object.
 * @return stdClass
 */
function theme_ufpel_get_theme_config($theme) {
    $config = new stdClass();
    
    // Safe access to theme settings.
    $config->preset = $theme->settings->preset ?? 'default.scss';
    $config->scsspre = $theme->settings->scsspre ?? '';
    $config->scss = $theme->settings->scss ?? '';
    
    return $config;
}

/**
 * Get available custom preset files for theme settings.
 *
 * This function scans the theme's preset directory and returns
 * a list of available custom SCSS preset files.
 *
 * @return array Array of custom preset choices (filename => display name).
 */
function theme_ufpel_get_custom_presets() {
    global $CFG;
    
    $custompresets = [];
    
    try {
        $presetdir = $CFG->dirroot . '/theme/ufpel/scss/preset/';
        
        if (is_dir($presetdir) && is_readable($presetdir)) {
            $files = scandir($presetdir);
            
            if ($files !== false) {
                foreach ($files as $file) {
                    // Only include .scss files, exclude standard Boost presets.
                    if (pathinfo($file, PATHINFO_EXTENSION) === 'scss' && 
                        $file !== '.' && $file !== '..' && 
                        !in_array($file, ['default.scss', 'plain.scss'])) {
                        
                        $presetname = pathinfo($file, PATHINFO_FILENAME);
                        $displayname = ucwords(str_replace(['_', '-'], ' ', $presetname));
                        $custompresets[$file] = $displayname;
                    }
                }
            }
        }
        
    } catch (Exception $e) {
        error_log('theme_ufpel: Error scanning custom presets - ' . $e->getMessage());
    }
    
    return $custompresets;
}