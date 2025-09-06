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
 * Strings de idioma em inglês para o tema UFPel
 *
 * Define todas as strings utilizadas no tema UFPel em inglês,
 * servindo como fallback para outros idiomas.
 *
 * @package    theme_ufpel
 * @copyright  2025 Universidade Federal de Pelotas
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Informações básicas do tema
$string['pluginname'] = 'UFPel';
$string['themename'] = 'UFPel Theme';
$string['themedescription'] = 'Custom theme for Federal University of Pelotas (UFPel), based on Boost theme with institutional branding and enhanced accessibility features.';

// Configurações gerais
$string['configtitle'] = 'UFPel Theme Settings';
$string['choosereadme'] = 'UFPel is a modern theme built on top of Boost, designed specifically for Federal University of Pelotas with institutional colors and branding.';

// Configurações de cores
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

// Configurações de imagens
$string['imagesettings'] = 'Image Settings';
$string['imagesettings_desc'] = 'Configure logos and institutional images.';
$string['logo'] = 'Logo';
$string['logo_desc'] = 'Upload the institutional logo to replace the default navbar brand.';
$string['favicon'] = 'Favicon';
$string['favicon_desc'] = 'Upload a custom favicon for the site.';

// Configurações de SCSS
$string['scsssettings'] = 'SCSS Settings';
$string['scsssettings_desc'] = 'Advanced styling configuration using SCSS.';
$string['rawscss'] = 'Raw SCSS';
$string['rawscss_desc'] = 'Use this field to provide SCSS or CSS code which will be injected at the end of the style sheet.';
$string['preset'] = 'Theme Preset';
$string['preset_desc'] = 'Pick a preset to broadly change the look of the theme.';

// Configurações avançadas
$string['advancedsettings'] = 'Advanced Settings';
$string['advancedsettings_desc'] = 'Additional configuration options for the theme.';
$string['enablecourseheader'] = 'Enable Course Header';
$string['enablecourseheader_desc'] = 'Enable the custom course header with cover image and course information.';
$string['enableimagecache'] = 'Enable Image Cache';
$string['enableimagecache_desc'] = 'Enable caching for course images to improve performance.';

// Strings para templates
$string['coursetitle'] = 'Course: {$a}';
$string['gotocourse'] = 'Go to course';
$string['coursecoverimage'] = 'Course cover image';
$string['brandlogo'] = 'Brand logo';

// Strings de navegação
$string['home'] = 'Home';
$string['dashboard'] = 'Dashboard';
$string['mycourses'] = 'My courses';

// Strings de acessibilidade
$string['skiptomaincontent'] = 'Skip to main content';
$string['skipcourseheader'] = 'Skip course header';
$string['mainnavigation'] = 'Main navigation';

// Regiões de blocos
$string['region-side-pre'] = 'Right';
$string['region-side-post'] = 'Left';

// Mensagens de erro/sucesso
$string['logouploadsuccess'] = 'Logo uploaded successfully';
$string['logouploadfailed'] = 'Failed to upload logo';
$string['colorsaved'] = 'Color settings saved successfully';
$string['invalidsetting'] = 'Invalid setting value';

// Strings para renderers
$string['courseheader'] = 'Course Header';
$string['courseinfo'] = 'Course Information';
$string['nocourseimage'] = 'No course image available';

// Footer strings.
$string['allrightsreserved'] = 'All rights reserved';
$string['quicklinks'] = 'Quick links';
$string['institutionalsite'] = 'Institutional website';
$string['library'] = 'Library';
$string['support'] = 'Support';
$string['accessibility'] = 'Accessibility';
$string['wcagcompliant'] = 'WCAG 2.1 compliant';
$string['responsive'] = 'Responsive design';
$string['accessibilitypolicy'] = 'Accessibility policy';
$string['poweredby'] = 'Powered by Moodle';
$string['themeversion'] = 'Theme version';
$string['lastupdate'] = 'Last update';