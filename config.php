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
 * Theme UFPel - Simplified Configuration
 *
 * @package    theme_ufpel
 * @copyright  2025 Your Organization
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// The name of the theme.
$THEME->name = 'ufpel';

// This theme depends upon Boost.
$THEME->parents = ['boost'];

// Main SCSS file.
$THEME->scss = function($theme) {
    return theme_ufpel_get_main_scss_content($theme);
};

// We don't add custom layouts - use Boost's.
$THEME->layouts = [];

// Enable dock.
$THEME->enable_dock = false;

// Use course index.
$THEME->usescourseindex = true;

// This is a basic theme - no fancy features.
$THEME->yuicssmodules = [];
$THEME->rendererfactory = 'theme_overridden_renderer_factory';
$THEME->requiredblocks = '';

// End of file.