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
 * Configuração principal do tema UFPel
 *
 * Este arquivo define as configurações básicas do tema UFPel,
 * incluindo herança do tema Boost, layouts e configurações de SCSS.
 *
 * @package    theme_ufpel
 * @copyright  2025 Universidade Federal de Pelotas
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Nome do tema
$THEME->name = 'ufpel';

// Tema pai - herda integralmente do Boost
$THEME->parents = ['boost'];

// Folhas de estilo - removido pois utilizamos SCSS
$THEME->sheets = [];

// Configuração de SCSS - utiliza o pipeline padrão do Moodle 5.x
$THEME->scss = function($theme) {
    return theme_ufpel_get_main_scss_content($theme);
};

// Suporte a editor de texto
$THEME->editor_sheets = [];

// Configurações de CSS para RTL (Right-to-Left)
$THEME->parents_exclude_sheets = [];

// Plugins suportados - herda do Boost
$THEME->plugins_exclude_sheets = [];

// Layouts - herda todos os layouts do tema Boost para compatibilidade Moodle 5.x
$THEME->layouts = [];

// Configurações de renderização - corrigido para Moodle 5.x
$THEME->rendererfactory = 'theme_overridden_renderer_factory';

// Permite customização de CSS via painel administrativo
$THEME->enable_dock = false;

// Configurações de JavaScript - corrigido para Moodle 5.x
$THEME->javascripts = [];
$THEME->javascripts_footer = [];

// Suporte à otimização CSS - habilitado para melhor performance
$THEME->supportscssoptimisation = true;

// Define que o tema suporta customização via SCSS
$THEME->csstreepostprocessor = 'theme_ufpel_css_tree_post_processor';

// Configurações de preset SCSS
$THEME->presetsfile = 'presets/default.scss';

// Configurações extras específicas do tema UFPel
$THEME->extrascsscallback = 'theme_ufpel_get_extra_scss';

// Configurações de favicon personalizado
$THEME->favicon = 'pix/favicon.ico';

// Habilita uso de course index - importante para Moodle 5.x
$THEME->usescourseindex = true;

// Configurações de acessibilidade WCAG 2.2
$THEME->hidefromselector = false;

// Configurações de cache para performance
$THEME->cacheable = true;

// Define callbacks personalizados para o tema
$THEME->csspostprocess = 'theme_ufpel_process_css';

// Configurações de customização de cores
$THEME->blockrtlmanipulations = [];

// Suporte a presets via painel administrativo
$THEME->presets = [
    'default.scss' => 'default.scss',
];

// Configurações adicionais para compatibilidade com Moodle 5.x
$THEME->requiredblocks = '';
$THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_DEFAULT;

// Habilitações específicas do Moodle 5.x
$THEME->enablecourseheadermenu = true;
$THEME->activityheaderconfig = [
    'notitle' => false,
    'nodescription' => false,
    'nocompletion' => false,
    'nofloat' => false,
];

// Remove propriedades obsoletas do Moodle 5.x
// $THEME->yuicssmodules = []; // Removido - YUI não é mais usado no Moodle 5.x