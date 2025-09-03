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
 * Theme UFPel - Version information
 *
 * @package    theme_ufpel
 * @copyright  2025 Your Organization
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$plugin->component = 'theme_ufpel';           // Full frankenstyle component name.
$plugin->version   = 2025090200;              // Version YYYYMMDDXX.
$plugin->requires  = 2024041600;              // Requires Moodle 5.0 (adjust based on your exact version).
$plugin->maturity  = MATURITY_STABLE;         // Plugin maturity level.
$plugin->release   = '1.0.0';                 // Human-readable release version.

// Dependencies.
$plugin->dependencies = [
    'theme_boost' => 2024041600,              // Requires Boost theme from Moodle 5.0+.
];