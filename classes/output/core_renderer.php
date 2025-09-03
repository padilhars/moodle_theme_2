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
 * Renderers to align Moodle's HTML with that expected by Bootstrap
 *
 * This file is currently a placeholder. The UFPel theme inherits all
 * renderers from the Boost theme. If you need to override any renderers,
 * you can do so in this file.
 *
 * @package    theme_ufpel
 * @copyright  2025 Your Organization
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_ufpel\output;

defined('MOODLE_INTERNAL') || die();

// Currently, we're using all renderers from Boost without modifications.
// To override a renderer, uncomment and modify the class below:

/*
use theme_boost\output\core_renderer as boost_core_renderer;

class core_renderer extends boost_core_renderer {
    
    // Example: Override the user menu to add custom items
    public function user_menu($user = null, $withlinks = null) {
        $usermenu = parent::user_menu($user, $withlinks);
        
        // Add your customizations here
        
        return $usermenu;
    }
    
    // Example: Customize the navbar
    public function navbar() {
        $navbar = parent::navbar();
        
        // Add your customizations here
        
        return $navbar;
    }
}
*/