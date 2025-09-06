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
 * English language strings for UFPel theme
 *
 * Defines all strings used in the UFPel theme in English,
 * serving as fallback for other languages. Compatible with Moodle 5.x.
 *
 * @package    theme_ufpel
 * @copyright  2025 Universidade Federal de Pelotas
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Basic theme information
$string['pluginname'] = 'UFPel';
$string['themename'] = 'UFPel Theme';
$string['themedescription'] = 'Custom theme for Federal University of Pelotas (UFPel), based on Boost theme with institutional branding and enhanced accessibility features compatible with Moodle 5.x.';

// General settings
$string['configtitle'] = 'UFPel Theme Settings';
$string['choosereadme'] = 'UFPel is a modern theme built on top of Boost, designed specifically for Federal University of Pelotas with institutional colors and branding compatible with Moodle 5.x.';

// Color settings
$string['colorsettings'] = 'Color Settings';
$string['colorsettings_desc'] = 'Configure the institutional color palette for UFPel theme.';
$string['primarycolor'] = 'Primary Color';
$string['primarycolor_desc'] = 'Main institutional color (default: #00408F)';
$string['secondarycolor'] = 'Secondary Color';
$string['secondarycolor_desc'] = 'Secondary institutional color (default: #0080FF)';
$string['accentcolor'] = 'Accent Color';
$string['accentcolor_desc'] = 'Highlight and accent color (default: #F7A600)';
$string['backgroundcolor'] = 'Background Color';
$string['backgroundcolor_desc'] = 'Main background color (default: #EBF5FF)';
$string['textcolor'] = 'Text Color';
$string['textcolor_desc'] = 'Primary text color (default: #6C6B6B)';
$string['highlighttext'] = 'Highlight Text Color';
$string['highlighttext_desc'] = 'Text color for highlighted elements (default: #FFFFFF)';

// Image settings
$string['imagesettings'] = 'Image Settings';
$string['imagesettings_desc'] = 'Configure logos and institutional images.';
$string['logo'] = 'Logo';
$string['logo_desc'] = 'Upload the institutional logo to replace the default navbar brand.';
$string['favicon'] = 'Favicon';
$string['favicon_desc'] = 'Upload a custom favicon for the site.';
$string['loginbackground'] = 'Login Background Image';
$string['loginbackground_desc'] = 'Upload a custom background image for the login page.';

// SCSS settings
$string['scsssettings'] = 'SCSS Settings';
$string['scsssettings_desc'] = 'Advanced styling configuration using SCSS.';
$string['rawscss'] = 'Raw SCSS';
$string['rawscss_desc'] = 'Use this field to provide SCSS or CSS code which will be injected at the end of the style sheet.';
$string['preset'] = 'Theme Preset';
$string['preset_desc'] = 'Pick a preset to broadly change the look of the theme.';

// Advanced settings
$string['advancedsettings'] = 'Advanced Settings';
$string['advancedsettings_desc'] = 'Additional configuration options for the theme.';
$string['enablecourseheader'] = 'Enable Course Header';
$string['enablecourseheader_desc'] = 'Enable the custom course header with cover image and course information.';
$string['enableimagecache'] = 'Enable Image Cache';
$string['enableimagecache_desc'] = 'Enable caching for course images to improve performance.';
$string['enableperformanceoptimization'] = 'Enable Performance Optimization';
$string['enableperformanceoptimization_desc'] = 'Enable CSS and JavaScript optimizations for better performance.';
$string['enabledarkmode'] = 'Enable Dark Mode';
$string['enabledarkmode_desc'] = 'Enable dark mode support (feature in development).';
$string['customjs'] = 'Custom JavaScript';
$string['customjs_desc'] = 'Add custom JavaScript code that will be executed on all pages.';

// Accessibility settings
$string['accessibilitysettings'] = 'Accessibility Settings';
$string['enablehighcontrast'] = 'Enable High Contrast';
$string['enablehighcontrast_desc'] = 'Enable high contrast mode for better accessibility.';
$string['fontsize'] = 'Font Size';
$string['fontsize_desc'] = 'Set the base font size for better readability.';
$string['fontsize_small'] = 'Small';
$string['fontsize_normal'] = 'Normal';
$string['fontsize_large'] = 'Large';
$string['fontsize_xlarge'] = 'Extra Large';
$string['enablereducedmotion'] = 'Reduce Motion';
$string['enablereducedmotion_desc'] = 'Reduce animations and transitions for motion-sensitive users.';

// Template strings
$string['coursetitle'] = 'Course: {$a}';
$string['gotocourse'] = 'Go to course';
$string['coursecoverimage'] = 'Course cover image';
$string['brandlogo'] = 'Brand logo';

// Navigation strings
$string['home'] = 'Home';
$string['dashboard'] = 'Dashboard';
$string['mycourses'] = 'My courses';

// Accessibility strings
$string['skiptomaincontent'] = 'Skip to main content';
$string['skipcourseheader'] = 'Skip course header';
$string['mainnavigation'] = 'Main navigation';

// Block regions
$string['region-side-pre'] = 'Right';
$string['region-side-post'] = 'Left';

// Error/success messages
$string['logouploadsuccess'] = 'Logo uploaded successfully';
$string['logouploadfailed'] = 'Failed to upload logo';
$string['colorsaved'] = 'Color settings saved successfully';
$string['invalidsetting'] = 'Invalid setting value';

// Renderer strings
$string['courseheader'] = 'Course Header';
$string['courseinfo'] = 'Course Information';
$string['nocourseimage'] = 'No course image available';

// Footer strings
$string['allrightsreserved'] = 'All rights reserved';
$string['quicklinks'] = 'Quick links';
$string['institutionalsite'] = 'Institutional website';
$string['library'] = 'Library';
$string['support'] = 'Support';
$string['accessibility'] = 'Accessibility';
$string['wcagcompliant'] = 'WCAG 2.2 compliant';
$string['responsive'] = 'Responsive design';
$string['accessibilitypolicy'] = 'Accessibility policy';
$string['poweredby'] = 'Powered by';
$string['themeversion'] = 'Theme version';
$string['lastupdate'] = 'Last update';

// Course progress strings
$string['courseprogress'] = 'Course Progress';
$string['progresspercentage'] = 'Progress percentage';
$string['milestone25'] = '25% completion milestone';
$string['milestone50'] = '50% completion milestone';
$string['milestone75'] = '75% completion milestone';
$string['milestone100'] = '100% completion milestone';
$string['completed'] = 'completed';
$string['total'] = 'total';
$string['remaining'] = 'remaining';

// Theme information strings
$string['themeinfo'] = 'Theme Information';
$string['themeinfo_desc'] = 'This theme was developed specifically for the Federal University of Pelotas (UFPel) with a focus on accessibility, usability, and institutional visual identity.';
$string['compatible_moodle5'] = 'Compatible with Moodle 5.x';
$string['documentation'] = 'Documentation';
$string['documentation_desc'] = 'For more information about using and configuring the theme, check the official documentation at: https://moodle.ufpel.edu.br/docs/theme-ufpel';

// Activity and course strings
$string['activitycompleted'] = 'Activity completed';
$string['activitynotcompleted'] = 'Activity not completed';
$string['coursecategory'] = 'Course category';
$string['courseparticipants'] = 'Course participants';
$string['courseimage'] = 'Course image';

// Form strings
$string['required'] = 'Required';
$string['optional'] = 'Optional';
$string['save'] = 'Save';
$string['cancel'] = 'Cancel';
$string['edit'] = 'Edit';
$string['delete'] = 'Delete';
$string['confirm'] = 'Confirm';

// Message strings
$string['success'] = 'Success';
$string['error'] = 'Error';
$string['warning'] = 'Warning';
$string['info'] = 'Information';
$string['loading'] = 'Loading...';
$string['nodata'] = 'No data available';

// Time strings
$string['today'] = 'Today';
$string['yesterday'] = 'Yesterday';
$string['thisweek'] = 'This week';
$string['lastweek'] = 'Last week';
$string['thismonth'] = 'This month';
$string['lastmonth'] = 'Last month';

// Responsive layout strings
$string['mobilemenu'] = 'Mobile menu';
$string['showmenu'] = 'Show menu';
$string['hidemenu'] = 'Hide menu';
$string['togglenavigation'] = 'Toggle navigation';

// Customization strings
$string['customcss'] = 'Custom CSS';
$string['customcss_desc'] = 'Add custom CSS that will be applied to all pages.';
$string['customlogo'] = 'Custom Logo';
$string['customlogo_desc'] = 'Upload a custom logo to replace the default logo.';

// Performance strings
$string['performance'] = 'Performance';
$string['cacheenabled'] = 'Cache enabled';
$string['cachedisabled'] = 'Cache disabled';
$string['optimized'] = 'Optimized';

// Dark mode strings
$string['darkmode'] = 'Dark Mode';
$string['lightmode'] = 'Light Mode';
$string['systemmode'] = 'Follow system';
$string['toggletheme'] = 'Toggle theme';

// Privacy API strings
$string['privacy:metadata'] = 'The UFPel theme does not store personal user data.';

// Cookie and GDPR strings
$string['cookieconsent'] = 'Cookie Consent';
$string['cookieconsent_desc'] = 'This site uses cookies to improve your browsing experience.';
$string['acceptcookies'] = 'Accept Cookies';
$string['managecookies'] = 'Manage Cookies';

// Contact and support strings
$string['contact'] = 'Contact';
$string['phone'] = 'Phone';
$string['email'] = 'Email';
$string['address'] = 'Address';
$string['supportcenter'] = 'Support Center';
$string['technicalissues'] = 'Technical Issues';
$string['reportbug'] = 'Report Bug';

// UFPel specific strings
$string['ufpel_full_name'] = 'Federal University of Pelotas';
$string['ufpel_acronym'] = 'UFPel';
$string['ufpel_slogan'] = 'Knowledge that transforms';
$string['ufpel_address'] = 'Rua Gomes Carneiro, 1 - Centro, Pelotas - RS, Brazil';
$string['ufpel_phone'] = '+55 (53) 3284-8000';
$string['ufpel_email'] = 'moodle@ufpel.edu.br';