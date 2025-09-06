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
 * Informações de versão do tema UFPel
 *
 * Este arquivo define as informações de versão, dependências e
 * compatibilidade do tema UFPel para o Moodle 5.x.
 *
 * @package    theme_ufpel
 * @copyright  2025 Universidade Federal de Pelotas
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Versão do plugin (formato: YYYYMMDDXX onde XX é o release do dia)
$plugin->version   = 2025090500;

// Versão mínima do Moodle requerida (Moodle 5.0)
$plugin->requires  = 2024042200;

// Nome do componente
$plugin->component = 'theme_ufpel';

// Dependências - requer o tema Boost
$plugin->dependencies = [
    'theme_boost' => 2024042200
];

// Versão para usuários (formato legível)
$plugin->release = '1.0.0';

// Nível de maturidade do plugin
// MATURITY_ALPHA, MATURITY_BETA, MATURITY_RC, MATURITY_STABLE
$plugin->maturity = MATURITY_STABLE;

// Compatibilidade com versões do Moodle
$plugin->supported = [50, 51]; // Suporta Moodle 5.0 e 5.1