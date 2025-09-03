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
 * Theme UFPel - Settings (Ultra Safe Version)
 *
 * @package    theme_ufpel
 * @copyright  2025 Your Organization
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Safety check - only proceed if we have proper context.
if (!isset($ADMIN) || !isset($settings)) {
    return;
}

// Only add settings if we have full tree access.
if ($ADMIN->fulltree) {
    
    // Avoid any database calls or file system access during initial load.
    // Use only static configuration.
    
    try {
        // Setting 1: Preset selector with static options.
        $name = 'theme_ufpel/preset';
        $title = 'Theme preset';
        $description = 'Choose a preset to change the look of the theme.';
        $default = 'default.scss';
        $choices = array(
            'default.scss' => 'Boost Default',
            'plain.scss' => 'Boost Plain'
        );
        
        $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $settings->add($setting);
        
        // Setting 2: Raw initial SCSS.
        $name = 'theme_ufpel/scsspre';
        $title = 'Raw initial SCSS';
        $description = 'Initial SCSS code injected before the theme preset.';
        $default = '';
        
        $setting = new admin_setting_configtextarea($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $settings->add($setting);
        
        // Setting 3: Raw SCSS.
        $name = 'theme_ufpel/scss';
        $title = 'Raw SCSS';
        $description = 'SCSS code injected after the theme preset.';
        $default = '';
        
        $setting = new admin_setting_configtextarea($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $settings->add($setting);
        
    } catch (Exception $e) {
        // Silently catch any errors to prevent breaking the admin interface.
        // Settings simply won't appear if there's an issue.
        error_log('theme_ufpel settings error: ' . $e->getMessage());
    }
}