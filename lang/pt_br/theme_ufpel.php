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
 * Language strings for theme_ufpel (Portuguese - Brazil)
 *
 * @package    theme_ufpel
 * @copyright  2025 Your Organization
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Geral.
$string['pluginname'] = 'UFPel';
$string['choosereadme'] = 'O tema UFPel é um tema filho do Boost, projetado para Moodle 5.x. Mantém total compatibilidade com o Boost permitindo personalização institucional através de presets SCSS.';
$string['configtitle'] = 'Configurações do tema UFPel';
$string['region-side-pre'] = 'Esquerda';

// Configurações.
$string['generalsettings'] = 'Configurações gerais';
$string['generalsettings_desc'] = 'Configure as configurações gerais do tema e opções de personalização SCSS.';

// Arquivos de preset.
$string['presetfiles'] = 'Arquivos de preset adicionais do tema';
$string['presetfiles_desc'] = 'Arquivos de preset podem ser usados para alterar drasticamente a aparência do tema. Veja <a href="https://docs.moodle.org/dev/Boost_Presets">Presets do Boost</a> para informações sobre criar e compartilhar seus próprios arquivos de preset.';
$string['preset'] = 'Preset do tema';
$string['preset_desc'] = 'Escolha um preset para mudar amplamente a aparência do tema.';

// SCSS bruto.
$string['rawscsspre'] = 'SCSS inicial bruto';
$string['rawscsspre_desc'] = 'Neste campo você pode fornecer código SCSS de inicialização, ele será injetado antes de todo o resto. Na maioria das vezes você usará esta configuração para definir variáveis.';
$string['rawscss'] = 'SCSS bruto';
$string['rawscss_desc'] = 'Use este campo para fornecer código SCSS ou CSS que será injetado no final da folha de estilos.';

// Capacidades.
$string['ufpel:configure'] = 'Configurar as definições do tema UFPel';

// Privacidade.
$string['privacy:metadata'] = 'O tema UFPel não armazena nenhum dado pessoal.';