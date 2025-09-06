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
 * Strings de idioma em português brasileiro para o tema UFPel
 *
 * Define todas as strings utilizadas no tema UFPel em português brasileiro,
 * sendo o idioma principal da instituição.
 *
 * @package    theme_ufpel
 * @copyright  2025 Universidade Federal de Pelotas
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Informações básicas do tema
$string['pluginname'] = 'UFPel';
$string['themename'] = 'Tema UFPel';
$string['themedescription'] = 'Tema personalizado para a Universidade Federal de Pelotas (UFPel), baseado no tema Boost com identidade visual institucional e recursos aprimorados de acessibilidade.';

// Configurações gerais
$string['configtitle'] = 'Configurações do Tema UFPel';
$string['choosereadme'] = 'UFPel é um tema moderno construído sobre o Boost, projetado especificamente para a Universidade Federal de Pelotas com cores e identidade visual institucional.';

// Configurações de cores
$string['colorsettings'] = 'Configurações de Cores';
$string['colorsettings_desc'] = 'Configure a paleta de cores institucional do tema UFPel.';
$string['primarycolor'] = 'Cor Primária';
$string['primarycolor_desc'] = 'Cor institucional principal (padrão: #00408F)';
$string['secondarycolor'] = 'Cor Secundária';
$string['secondarycolor_desc'] = 'Cor institucional secundária (padrão: #0080FF)';
$string['accentcolor'] = 'Cor de Destaque';
$string['accentcolor_desc'] = 'Cor de realce e destaque (padrão: #F7A600)';
$string['backgroundcolor'] = 'Cor de Fundo';
$string['backgroundcolor_desc'] = 'Cor de fundo principal (padrão: #EBF5FF)';
$string['textcolor'] = 'Cor do Texto';
$string['textcolor_desc'] = 'Cor primária do texto (padrão: #6C6B6B)';
$string['highlighttext'] = 'Cor do Texto em Destaque';
$string['highlighttext_desc'] = 'Cor do texto para elementos destacados (padrão: #FFFFFF)';

// Configurações de imagens
$string['imagesettings'] = 'Configurações de Imagens';
$string['imagesettings_desc'] = 'Configure logotipos e imagens institucionais.';
$string['logo'] = 'Logotipo';
$string['logo_desc'] = 'Envie o logotipo institucional para substituir a marca padrão da barra de navegação.';
$string['favicon'] = 'Favicon';
$string['favicon_desc'] = 'Envie um favicon personalizado para o site.';

// Configurações de SCSS
$string['scsssettings'] = 'Configurações SCSS';
$string['scsssettings_desc'] = 'Configuração avançada de estilos usando SCSS.';
$string['rawscss'] = 'SCSS Personalizado';
$string['rawscss_desc'] = 'Use este campo para fornecer código SCSS ou CSS que será injetado no final da folha de estilos.';
$string['preset'] = 'Preset do Tema';
$string['preset_desc'] = 'Escolha um preset para alterar amplamente a aparência do tema.';

// Configurações avançadas
$string['advancedsettings'] = 'Configurações Avançadas';
$string['advancedsettings_desc'] = 'Opções adicionais de configuração para o tema.';
$string['enablecourseheader'] = 'Habilitar Cabeçalho do Curso';
$string['enablecourseheader_desc'] = 'Habilita o cabeçalho personalizado do curso com imagem de capa e informações do curso.';
$string['enableimagecache'] = 'Habilitar Cache de Imagens';
$string['enableimagecache_desc'] = 'Habilita o cache para imagens de curso para melhorar a performance.';

// Strings para templates
$string['coursetitle'] = 'Curso: {$a}';
$string['gotocourse'] = 'Ir para o curso';
$string['coursecoverimage'] = 'Imagem de capa do curso';
$string['brandlogo'] = 'Logotipo da marca';

// Strings de navegação
$string['home'] = 'Início';
$string['dashboard'] = 'Painel';
$string['mycourses'] = 'Meus cursos';

// Strings de acessibilidade
$string['skiptomaincontent'] = 'Pular para o conteúdo principal';
$string['skipcourseheader'] = 'Pular cabeçalho do curso';
$string['mainnavigation'] = 'Navegação principal';

// Regiões de blocos
$string['region-side-pre'] = 'Direita';
$string['region-side-post'] = 'Esquerda';

// Mensagens de erro/sucesso
$string['logouploadsuccess'] = 'Logotipo enviado com sucesso';
$string['logouploadfailed'] = 'Falha ao enviar logotipo';
$string['colorsaved'] = 'Configurações de cores salvas com sucesso';
$string['invalidsetting'] = 'Valor de configuração inválido';

// Strings para renderers
$string['courseheader'] = 'Cabeçalho do Curso';
$string['courseinfo'] = 'Informações do Curso';
$string['nocourseimage'] = 'Nenhuma imagem de curso disponível';

// Strings do rodapé.
$string['allrightsreserved'] = 'Todos os direitos reservados';
$string['quicklinks'] = 'Links rápidos';
$string['institutionalsite'] = 'Site institucional';
$string['library'] = 'Biblioteca';
$string['support'] = 'Suporte';
$string['accessibility'] = 'Acessibilidade';
$string['wcagcompliant'] = 'Compatível com WCAG 2.1';
$string['responsive'] = 'Design responsivo';
$string['accessibilitypolicy'] = 'Política de acessibilidade';
$string['poweredby'] = 'Desenvolvido com Moodle';
$string['themeversion'] = 'Versão do tema';
$string['lastupdate'] = 'Última atualização';