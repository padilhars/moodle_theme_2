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
 * Theme UFPel - Settings (Moodle 5.x Best Practices)
 *
 * @package    theme_ufpel
 * @copyright  2025 Your Organization
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Early exit if not in admin context or if variables not set.
if (!isset($ADMIN, $settings) || !$ADMIN instanceof admin_root) {
    return;
}

// Only proceed if we have full admin tree access.
if (!$ADMIN->fulltree) {
    return;
}

// Verify theme is properly installed.
try {
    $themeconfig = theme_config::load('ufpel');
    if (!$themeconfig) {
        return;
    }
} catch (Exception $e) {
    error_log('theme_ufpel settings: Cannot load theme config - ' . $e->getMessage());
    return;
}

// Create settings page using appropriate class for Moodle 5.x.
if (class_exists('theme_boost_admin_settingspage_tabs')) {
    $settings = new theme_boost_admin_settingspage_tabs('themesettingufpel', get_string('configtitle', 'theme_ufpel'));
} else {
    // Fallback for different Moodle versions.
    $settings = new admin_settingspage('themesettingufpel', get_string('configtitle', 'theme_ufpel'));
}

// General settings section.
$page = new admin_settingpage('theme_ufpel_general', get_string('generalsettings', 'theme_ufpel'));

try {
    // Preset selection setting.
    $name = 'theme_ufpel/preset';
    $title = get_string('preset', 'theme_ufpel');
    $description = get_string('preset_desc', 'theme_ufpel');
    $default = 'default.scss';
    
    // Define available presets - start with standard Boost presets.
    $presetchoices = [
        'default.scss' => 'Default',
        'plain.scss' => 'Plain'
    ];
    
    // Add any custom preset files from the theme (function is in lib.php).
    $custompresets = theme_ufpel_get_custom_presets();
    if (!empty($custompresets)) {
        $presetchoices = array_merge($presetchoices, $custompresets);
    }
    
    $setting = new admin_setting_configselect($name, $title, $description, $default, $presetchoices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Raw initial SCSS setting.
    $name = 'theme_ufpel/scsspre';
    $title = get_string('rawscsspre', 'theme_ufpel');
    $description = get_string('rawscsspre_desc', 'theme_ufpel');
    $default = '';
    
    // Use appropriate SCSS setting class based on availability.
    if (class_exists('admin_setting_scsscode')) {
        $setting = new admin_setting_scsscode($name, $title, $description, $default, PARAM_RAW);
    } else {
        $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    }
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    
    // Raw SCSS setting.
    $name = 'theme_ufpel/scss';
    $title = get_string('rawscss', 'theme_ufpel');
    $description = get_string('rawscss_desc', 'theme_ufpel');
    $default = '';
    
    // Use appropriate SCSS setting class based on availability.
    if (class_exists('admin_setting_scsscode')) {
        $setting = new admin_setting_scsscode($name, $title, $description, $default, PARAM_RAW);
    } else {
        $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    }
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

} catch (Exception $e) {
    // Log errors but don't break admin interface.
    error_log('theme_ufpel settings error: ' . $e->getMessage());
    
    // Add a basic message if settings fail to load.
    $setting = new admin_setting_heading(
        'theme_ufpel/error',
        get_string('error'),
        'Settings could not be loaded. Please check the error logs for more details.'
    );
    $page->add($setting);
}

// Add the page to settings.
$settings->add($page);