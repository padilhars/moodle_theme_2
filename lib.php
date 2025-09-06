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
 * Funções principais do tema UFPel
 *
 * Este arquivo contém todas as funções auxiliares e callbacks
 * necessários para o funcionamento do tema UFPel no Moodle 5.x.
 *
 * @package    theme_ufpel
 * @copyright  2025 Universidade Federal de Pelotas
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Injeta CSS adicional customizado no tema
 *
 * Esta função é chamada para adicionar CSS personalizado baseado
 * nas configurações do tema definidas no painel administrativo.
 *
 * @param theme_config $theme O objeto de configuração do tema
 * @return string CSS personalizado a ser injetado
 */
function theme_ufpel_get_extra_scss($theme) {
    $content = '';
    
    // Obtém as configurações de cor do tema
    $primarycolor = get_config('theme_ufpel', 'primarycolor');
    $secondarycolor = get_config('theme_ufpel', 'secondarycolor');
    $accentcolor = get_config('theme_ufpel', 'accentcolor');
    $backgroundcolor = get_config('theme_ufpel', 'backgroundcolor');
    $textcolor = get_config('theme_ufpel', 'textcolor');
    $highlighttext = get_config('theme_ufpel', 'highlighttext');

    // Define variáveis SCSS para as cores institucionais
    if (!empty($primarycolor)) {
        $content .= '$ufpel-primary: ' . $primarycolor . ';' . "\n";
        $content .= '$primary: ' . $primarycolor . ';' . "\n";
    }
    
    if (!empty($secondarycolor)) {
        $content .= '$ufpel-secondary: ' . $secondarycolor . ';' . "\n";
        $content .= '$secondary: ' . $secondarycolor . ';' . "\n";
    }
    
    if (!empty($accentcolor)) {
        $content .= '$ufpel-accent: ' . $accentcolor . ';' . "\n";
        $content .= '$warning: ' . $accentcolor . ';' . "\n";
    }
    
    if (!empty($backgroundcolor)) {
        $content .= '$ufpel-background: ' . $backgroundcolor . ';' . "\n";
        $content .= '$body-bg: ' . $backgroundcolor . ';' . "\n";
    }
    
    if (!empty($textcolor)) {
        $content .= '$ufpel-text: ' . $textcolor . ';' . "\n";
        $content .= '$body-color: ' . $textcolor . ';' . "\n";
    }
    
    if (!empty($highlighttext)) {
        $content .= '$ufpel-highlight-text: ' . $highlighttext . ';' . "\n";
    }

    return $content;
}

/**
 * Obtém o conteúdo SCSS principal do tema
 *
 * Esta função implementa o pipeline de SCSS do tema UFPel,
 * concatenando pre.scss + preset + post.scss conforme especificado.
 *
 * @param theme_config $theme O objeto de configuração do tema
 * @return string Conteúdo SCSS completo para compilação
 */
function theme_ufpel_get_main_scss_content($theme) {
    global $CFG;

    $scss = '';
    
    // 1. Adiciona pre.scss (configurações iniciais)
    $prescss = $CFG->dirroot . '/theme/ufpel/scss/pre.scss';
    if (file_exists($prescss)) {
        $scss .= file_get_contents($prescss);
    }

    // 2. Adiciona preset
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : 'default.scss';
    $fs = get_file_storage();
    $context = context_system::instance();
    
    // Tenta carregar arquivo de preset personalizado
    if ($filename !== 'default.scss') {
        $presetfile = $fs->get_file($context->id, 'theme_ufpel', 'preset', 0, '/', $filename);
        if (!$presetfile) {
            // Fallback para o preset padrão se o arquivo não existir
            $defaultpreset = $CFG->dirroot . '/theme/ufpel/scss/preset/default.scss';
            if (file_exists($defaultpreset)) {
                $scss .= file_get_contents($defaultpreset);
            }
        } else {
            $scss .= $presetfile->get_content();
        }
    } else {
        // Carrega preset padrão
        $defaultpreset = $CFG->dirroot . '/theme/ufpel/scss/preset/default.scss';
        if (file_exists($defaultpreset)) {
            $scss .= file_get_contents($defaultpreset);
        }
    }

    // 3. Adiciona SCSS customizado das configurações
    $scss .= theme_ufpel_get_extra_scss($theme);

    // 4. Adiciona SCSS personalizado do painel administrativo
    if (!empty($theme->settings->scssraw)) {
        $scss .= $theme->settings->scssraw;
    }

    // 5. Adiciona post.scss (finalizações)
    $postscss = $CFG->dirroot . '/theme/ufpel/scss/post.scss';
    if (file_exists($postscss)) {
        $scss .= file_get_contents($postscss);
    }

    return $scss;
}

/**
 * Processa CSS adicional após a compilação
 *
 * Esta função é chamada após a compilação do SCSS para
 * fazer ajustes finais no CSS gerado.
 *
 * @param string $css O CSS compilado
 * @param theme_config $theme O objeto de configuração do tema
 * @return string CSS processado
 */
function theme_ufpel_process_css($css, $theme) {
    // Substitui URLs de imagens personalizadas
    $css = theme_ufpel_set_logo($css, $theme);
    $css = theme_ufpel_set_favicon($css, $theme);

    return $css;
}

/**
 * Define o logotipo personalizado no CSS
 *
 * Substitui referências ao logotipo padrão pelo logotipo
 * personalizado configurado no painel administrativo.
 *
 * @param string $css CSS a ser processado
 * @param theme_config $theme Configuração do tema
 * @return string CSS com logotipo atualizado
 */
function theme_ufpel_set_logo($css, $theme) {
    $logo = $theme->setting_file_url('logo', 'logo');
    if (!empty($logo)) {
        $tag = '[[setting:logo]]';
        $css = str_replace($tag, $logo, $css);
    }

    return $css;
}

/**
 * Define o favicon personalizado no CSS
 *
 * Substitui referências ao favicon padrão pelo favicon
 * personalizado configurado no painel administrativo.
 *
 * @param string $css CSS a ser processado
 * @param theme_config $theme Configuração do tema
 * @return string CSS com favicon atualizado
 */
function theme_ufpel_set_favicon($css, $theme) {
    $favicon = $theme->setting_file_url('favicon', 'favicon');
    if (!empty($favicon)) {
        $tag = '[[setting:favicon]]';
        $css = str_replace($tag, $favicon, $css);
    }

    return $css;
}

/**
 * Obtém a URL da imagem de capa do curso
 *
 * Esta função busca e retorna a URL da imagem de capa
 * de um curso específico para uso nos templates.
 *
 * @param int $courseid ID do curso
 * @return moodle_url|null URL da imagem ou null se não existir
 */
function theme_ufpel_get_course_image($courseid) {
    global $CFG;
    require_once($CFG->libdir . '/filelib.php');

    $context = context_course::instance($courseid);
    $fs = get_file_storage();
    
    // Busca arquivos na área de resumo do curso
    $files = $fs->get_area_files($context->id, 'course', 'overviewfiles', 0, 'filename', false);
    
    if ($files) {
        foreach ($files as $file) {
            if ($file->is_valid_image()) {
                return moodle_url::make_pluginfile_url(
                    $file->get_contextid(),
                    $file->get_component(),
                    $file->get_filearea(),
                    $file->get_itemid(),
                    $file->get_filepath(),
                    $file->get_filename()
                );
            }
        }
    }
    
    return null;
}

/**
 * Pós-processador da árvore CSS
 *
 * Função chamada para fazer ajustes finais na árvore CSS
 * antes da compilação final.
 *
 * @param css_tree $tree Árvore CSS
 * @param theme_config $theme Configuração do tema
 * @return css_tree Árvore CSS processada
 */
function theme_ufpel_css_tree_post_processor($tree, $theme) {
    // Aplica otimizações e ajustes específicos do tema
    return $tree;
}

/**
 * Callback para upload de preset
 *
 * Esta função é chamada quando um novo preset SCSS é
 * enviado através do painel administrativo.
 *
 * @param admin_setting $setting Configuração administrativa
 * @return string HTML do resultado do upload
 */
function theme_ufpel_update_settings_images($setting) {
    // Limpa caches quando imagens são atualizadas
    theme_reset_all_caches();
    return '';
}

/**
 * Implementa callback para templates Mustache
 *
 * Esta função adiciona dados específicos do tema UFPel ao contexto
 * dos templates Mustache, compatível com Moodle 5.x.
 *
 * @param array $context Contexto existente do template
 * @param stdClass $theme Configuração do tema
 * @return array Contexto atualizado
 */
function theme_ufpel_mustache_context_processor($context, $theme) {
    global $COURSE, $SITE;

    // Adiciona informações específicas do curso ao contexto
    if (isset($COURSE->id) && $COURSE->id > 1) {
        $context['courseid'] = $COURSE->id;
        $context['coursename'] = format_string($COURSE->fullname);
        $context['courseshortname'] = format_string($COURSE->shortname);
        
        // Adiciona URL da imagem de capa do curso
        $courseimage = theme_ufpel_get_course_image($COURSE->id);
        if ($courseimage) {
            $context['courseimage'] = $courseimage->out();
        }
    }

    // Adiciona configurações do tema ao contexto
    $context['ufpel_logo'] = $theme->setting_file_url('logo', 'logo');
    $context['ufpel_primarycolor'] = get_config('theme_ufpel', 'primarycolor');
    $context['institution_name'] = 'Universidade Federal de Pelotas';
    $context['institution_url'] = 'https://ufpel.edu.br';
    $context['current_year'] = date('Y');
    $context['enablecourseheader'] = get_config('theme_ufpel', 'enablecourseheader') ?? true;

    return $context;
}

/**
 * Hook para adicionar JavaScript específico do tema
 *
 * Função compatível com Moodle 5.x para adicionar funcionalidades JS.
 *
 * @param moodle_page $page A página atual
 */
function theme_ufpel_page_init(moodle_page $page) {
    // Adiciona JavaScript específico do tema se necessário
    // Exemplo: $page->requires->js('/theme/ufpel/javascript/theme.js');
}

/**
 * Obtém configurações exportáveis para JavaScript
 *
 * Permite exportar configurações do tema para uso em JavaScript.
 *
 * @param renderer_base $renderer O renderer atual
 * @return array Configurações exportáveis
 */
function theme_ufpel_get_exportable_settings($renderer) {
    return [
        'primarycolor' => get_config('theme_ufpel', 'primarycolor') ?: '#00408F',
        'secondarycolor' => get_config('theme_ufpel', 'secondarycolor') ?: '#0080FF',
        'accentcolor' => get_config('theme_ufpel', 'accentcolor') ?: '#F7A600',
    ];
}