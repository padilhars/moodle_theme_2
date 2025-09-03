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
 * Theme UFPel - Configuration (Moodle 5.x Compatible)
 *
 * @package    theme_ufpel
 * @copyright  2025 Your Organization
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Verify Moodle version compatibility.
if (!defined('MOODLE_INTERNAL') || version_compare($CFG->version ?? '0', '2024041600', '<')) {
    throw new moodle_exception('incompatibleversion', 'theme_ufpel');
}

// Theme name.
$THEME->name = 'ufpel';

// Parent theme - inherits from Boost.
$THEME->parents = ['boost'];

// SCSS compilation function.
$THEME->scss = function($theme) {
    return theme_ufpel_get_main_scss_content($theme);
};

// Use Boost's layouts - no custom layouts needed for basic child theme.
$THEME->layouts = [];

// Theme capabilities.
$THEME->enable_dock = false;
$THEME->usescourseindex = true;
$THEME->usefallback = true;

// Renderer factory - use standard overridden factory.
$THEME->rendererfactory = 'theme_overridden_renderer_factory';

// No required blocks.
$THEME->requiredblocks = '';

// Supported output formats.
$THEME->supportscssoptimisation = true;
$THEME->yuicssmodules = [];

// Image and icon settings for Moodle 5.x compatibility.
$THEME->iconsystem = \core\output\icon_system::FONTAWESOME;

// Template settings for Mustache compatibility.
$THEME->prescsscallback = 'theme_ufpel_get_pre_scss';
$THEME->extrascsscallback = 'theme_ufpel_get_post_scss';

// Additional theme settings that may be useful.
$THEME->javascripts = [];
$THEME->javascripts_footer = [];

// Editor stylesheets.
$THEME->editor_sheets = [];

// Disable theme designer mode optimizations in production.
$THEME->blockrtlcss = true;

// End of configuration.