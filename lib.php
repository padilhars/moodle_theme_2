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
 * Theme UFPel - Library functions (Safe Version)
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
    
    // Pre CSS - before the preset.
    $prescss = theme_ufpel_get_pre_scss($theme);
    
    // Get the preset.
    $preset = theme_ufpel_get_preset_scss($theme);
    
    // Post CSS - after the preset.
    $postcss = theme_ufpel_get_post_scss($theme);
    
    // Combine them together.
    return $prescss . "\n" . $preset . "\n" . $postcss;
}

/**
 * Returns the pre SCSS for the theme.
 * 
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_ufpel_get_pre_scss($theme) {
    $scss = '';
    
    // Check if pre.scss file exists and is readable.
    $prescssfile = __DIR__ . '/scss/pre.scss';
    if (file_exists($prescssfile) && is_readable($prescssfile)) {
        $scss .= file_get_contents($prescssfile);
    }
    
    // Add any custom pre scss from settings.
    if (!empty($theme->settings->scsspre)) {
        $scss .= "\n" . $theme->settings->scsspre;
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
    
    // Default to Boost's default.scss.
    $preset = 'default.scss';
    
    // Check if a preset is selected in settings.
    if (!empty($theme->settings->preset)) {
        $preset = $theme->settings->preset;
    }
    
    // Load the preset - start with Boost presets.
    $scss = '';
    
    if ($preset === 'default.scss' || $preset === 'plain.scss') {
        // It's a Boost preset.
        $presetfile = $CFG->dirroot . '/theme/boost/scss/preset/' . $preset;
        if (file_exists($presetfile) && is_readable($presetfile)) {
            $scss = file_get_contents($presetfile);
        }
    }
    
    // If no SCSS loaded yet, fallback to default.
    if (empty($scss)) {
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
    
    // Check if post.scss file exists and is readable.
    $postscssfile = __DIR__ . '/scss/post.scss';
    if (file_exists($postscssfile) && is_readable($postscssfile)) {
        $scss .= file_get_contents($postscssfile);
    }
    
    // Add any custom scss from settings.
    if (!empty($theme->settings->scss)) {
        $scss .= "\n" . $theme->settings->scss;
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
    // Check if we're in the system context.
    if ($context->contextlevel !== CONTEXT_SYSTEM) {
        return false;
    }
    
    // Check the filearea.
    if ($filearea !== 'preset') {
        return false;
    }
    
    // Extract file info.
    $itemid = array_shift($args);
    $filename = array_pop($args);
    
    // Extract the filepath.
    if (!$args) {
        $filepath = '/';
    } else {
        $filepath = '/' . implode('/', $args) . '/';
    }
    
    // Get file from storage.
    $fs = get_file_storage();
    $file = $fs->get_file($context->id, 'theme_ufpel', $filearea, $itemid, $filepath, $filename);
    
    if (!$file) {
        return false;
    }
    
    // Send the file.
    send_stored_file($file, 86400, 0, $forcedownload, $options);
    return true;
}