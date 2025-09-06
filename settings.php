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
 * Configurações administrativas do tema UFPel
 *
 * Este arquivo define todas as configurações disponíveis no painel
 * administrativo para personalização do tema UFPel no Moodle 5.x.
 *
 * @package    theme_ufpel
 * @copyright  2025 Universidade Federal de Pelotas
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Verifica se o usuário tem permissão para acessar as configurações
if ($ADMIN->fulltree) {

    // Página principal de configurações do tema - corrigido para Moodle 5.x
    $settings = new theme_boost_admin_settingspage_tabs('themesettingufpel', 
        get_string('configtitle', 'theme_ufpel'));

    /*
     * ========================================================================
     * GUIA: CONFIGURAÇÕES GERAIS
     * ========================================================================
     */
    $page = new admin_settingpage('theme_ufpel_general', get_string('generalsettings', 'admin'));

    // Configuração do preset SCSS
    $name = 'theme_ufpel/preset';
    $title = get_string('preset', 'theme_ufpel');
    $description = get_string('preset_desc', 'theme_ufpel');
    $default = 'default.scss';

    // Busca presets disponíveis - corrigido para Moodle 5.x
    $context = context_system::instance();
    $fs = get_file_storage();
    $files = $fs->get_area_files($context->id, 'theme_ufpel', 'preset', 0, 'itemid, filepath, filename', false);

    $choices = [];
    foreach ($files as $file) {
        $choices[$file->get_filename()] = $file->get_filename();
    }

    // Adiciona preset padrão se não houver arquivos
    if (empty($choices)) {
        $choices['default.scss'] = 'default.scss';
    }

    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Upload de arquivo de preset personalizado
    $name = 'theme_ufpel/presetfiles';
    $title = get_string('presetfiles', 'theme_boost');
    $description = get_string('presetfiles_desc', 'theme_boost');

    $setting = new admin_setting_configstoredfile($name, $title, $description, 'preset', 0,
        array('maxfiles' => 20, 'accepted_types' => array('.scss')));
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // SCSS personalizado
    $name = 'theme_ufpel/scssraw';
    $title = get_string('rawscss', 'theme_ufpel');
    $description = get_string('rawscss_desc', 'theme_ufpel');
    $default = '';
    $setting = new admin_setting_scsscode($name, $title, $description, $default, PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    /*
     * ========================================================================
     * GUIA: CONFIGURAÇÕES DE CORES
     * ========================================================================
     */
    $page = new admin_settingpage('theme_ufpel_colors', get_string('colorsettings', 'theme_ufpel'));

    // Cor primária
    $name = 'theme_ufpel/primarycolor';
    $title = get_string('primarycolor', 'theme_ufpel');
    $description = get_string('primarycolor_desc', 'theme_ufpel');
    $default = '#00408F';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Cor secundária
    $name = 'theme_ufpel/secondarycolor';
    $title = get_string('secondarycolor', 'theme_ufpel');
    $description = get_string('secondarycolor_desc', 'theme_ufpel');
    $default = '#0080FF';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Cor de destaque
    $name = 'theme_ufpel/accentcolor';
    $title = get_string('accentcolor', 'theme_ufpel');
    $description = get_string('accentcolor_desc', 'theme_ufpel');
    $default = '#F7A600';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Cor de fundo
    $name = 'theme_ufpel/backgroundcolor';
    $title = get_string('backgroundcolor', 'theme_ufpel');
    $description = get_string('backgroundcolor_desc', 'theme_ufpel');
    $default = '#EBF5FF';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Cor do texto
    $name = 'theme_ufpel/textcolor';
    $title = get_string('textcolor', 'theme_ufpel');
    $description = get_string('textcolor_desc', 'theme_ufpel');
    $default = '#6C6B6B';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Cor do texto em destaque
    $name = 'theme_ufpel/highlighttext';
    $title = get_string('highlighttext', 'theme_ufpel');
    $description = get_string('highlighttext_desc', 'theme_ufpel');
    $default = '#FFFFFF';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    /*
     * ========================================================================
     * GUIA: CONFIGURAÇÕES DE IMAGENS
     * ========================================================================
     */
    $page = new admin_settingpage('theme_ufpel_images', get_string('imagesettings', 'theme_ufpel'));

    // Upload do logotipo
    $name = 'theme_ufpel/logo';
    $title = get_string('logo', 'theme_ufpel');
    $description = get_string('logo_desc', 'theme_ufpel');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo', 0,
        array('maxfiles' => 1, 'accepted_types' => array('.png', '.jpg', '.jpeg', '.gif', '.svg')));
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Upload do favicon
    $name = 'theme_ufpel/favicon';
    $title = get_string('favicon', 'theme_ufpel');
    $description = get_string('favicon_desc', 'theme_ufpel');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'favicon', 0,
        array('maxfiles' => 1, 'accepted_types' => array('.ico', '.png')));
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Upload de imagem de fundo para login
    $name = 'theme_ufpel/loginbackground';
    $title = get_string('loginbackground', 'theme_ufpel');
    $description = get_string('loginbackground_desc', 'theme_ufpel');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'loginbackground', 0,
        array('maxfiles' => 1, 'accepted_types' => array('.png', '.jpg', '.jpeg')));
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    /*
     * ========================================================================
     * GUIA: CONFIGURAÇÕES AVANÇADAS
     * ========================================================================
     */
    $page = new admin_settingpage('theme_ufpel_advanced', get_string('advancedsettings', 'theme_ufpel'));

    // Configuração para ativar/desativar recursos específicos
    $name = 'theme_ufpel/enablecourseheader';
    $title = get_string('enablecourseheader', 'theme_ufpel');
    $description = get_string('enablecourseheader_desc', 'theme_ufpel');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Configuração para cache de imagens
    $name = 'theme_ufpel/enableimagecache';
    $title = get_string('enableimagecache', 'theme_ufpel');
    $description = get_string('enableimagecache_desc', 'theme_ufpel');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    // Configuração para otimização de performance
    $name = 'theme_ufpel/enableperformanceoptimization';
    $title = get_string('enableperformanceoptimization', 'theme_ufpel');
    $description = get_string('enableperformanceoptimization_desc', 'theme_ufpel');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    // Configuração para modo escuro (preparação futura)
    $name = 'theme_ufpel/enabledarkmode';
    $title = get_string('enabledarkmode', 'theme_ufpel');
    $description = get_string('enabledarkmode_desc', 'theme_ufpel');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Campo personalizado para JavaScript adicional
    $name = 'theme_ufpel/customjs';
    $title = get_string('customjs', 'theme_ufpel');
    $description = get_string('customjs_desc', 'theme_ufpel');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_RAW);
    $page->add($setting);

    $settings->add($page);

    /*
     * ========================================================================
     * GUIA: CONFIGURAÇÕES DE ACESSIBILIDADE
     * ========================================================================
     */
    $page = new admin_settingpage('theme_ufpel_accessibility', 
        get_string('accessibilitysettings', 'theme_ufpel'));

    // Alto contraste
    $name = 'theme_ufpel/enablehighcontrast';
    $title = get_string('enablehighcontrast', 'theme_ufpel');
    $description = get_string('enablehighcontrast_desc', 'theme_ufpel');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Tamanho da fonte
    $name = 'theme_ufpel/fontsize';
    $title = get_string('fontsize', 'theme_ufpel');
    $description = get_string('fontsize_desc', 'theme_ufpel');
    $default = '1rem';
    $choices = [
        '0.875rem' => get_string('fontsize_small', 'theme_ufpel'),
        '1rem' => get_string('fontsize_normal', 'theme_ufpel'),
        '1.125rem' => get_string('fontsize_large', 'theme_ufpel'),
        '1.25rem' => get_string('fontsize_xlarge', 'theme_ufpel'),
    ];
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Redução de movimento
    $name = 'theme_ufpel/enablereducedmotion';
    $title = get_string('enablereducedmotion', 'theme_ufpel');
    $description = get_string('enablereducedmotion_desc', 'theme_ufpel');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    /*
     * ========================================================================
     * GUIA: INFORMAÇÕES E SUPORTE
     * ========================================================================
     */
    $page = new admin_settingpage('theme_ufpel_info', get_string('themeinfo', 'theme_ufpel'));

    // Informações do tema
    $name = 'theme_ufpel/themeinfo';
    $heading = get_string('themeinfo', 'theme_ufpel');
    $information = get_string('themeinfo_desc', 'theme_ufpel');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    // Versão do tema
    $name = 'theme_ufpel/version';
    $heading = get_string('themeversion', 'theme_ufpel');
    $information = '1.0.1 - ' . get_string('compatible_moodle5', 'theme_ufpel');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    // Link para documentação
    $name = 'theme_ufpel/documentation';
    $heading = get_string('documentation', 'theme_ufpel');
    $information = get_string('documentation_desc', 'theme_ufpel');
    $setting = new admin_setting_heading($name, $heading, $information);
    $page->add($setting);

    $settings->add($page);
}