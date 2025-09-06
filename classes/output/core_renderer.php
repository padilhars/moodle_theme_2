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
 * Renderer principal do tema UFPel
 *
 * Este arquivo contém o renderer principal que herda do tema Boost
 * e implementa customizações específicas do tema UFPel.
 *
 * @package    theme_ufpel
 * @copyright  2025 Universidade Federal de Pelotas
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_ufpel\output;

use coding_exception;
use html_writer;
use tabobject;
use tabtree;
use custom_menu_item;
use custom_menu;
use core_block\output\block_contents;
use navigation_node;
use action_link;
use stdClass;
use moodle_url;
use preferences_groups;
use action_menu;
use help_icon;
use single_button;
use paging_bar;
use context_course;

defined('MOODLE_INTERNAL') || die();

/**
 * Renderer principal personalizado para o tema UFPel
 *
 * Herda todas as funcionalidades do renderer do tema Boost
 * e adiciona customizações específicas da UFPel.
 */
class core_renderer extends \theme_boost\output\core_renderer {

    /**
     * Renderiza a marca/logo da navbar personalizada
     *
     * Sobrescreve o método padrão para usar o template
     * personalizado navbar_brand.mustache do tema UFPel.
     *
     * @return string HTML da marca/logo renderizada
     */
    public function navbar_brand() {
        global $CFG, $SITE;

        // Prepara o contexto para o template Mustache
        $context = new stdClass();
        
        // URL da home
        $context->homeurl = new moodle_url('/');
        
        // Nome do site
        $context->sitename = format_string($SITE->shortname, true, ['context' => \context_system::instance()]);
        
        // URL do logotipo personalizado (se configurado)
        $logourl = $this->get_ufpel_logo_url();
        if ($logourl) {
            $context->ufpel_logo = $logourl;
        }

        // Renderiza usando o template personalizado
        return $this->render_from_template('theme_ufpel/navbar_brand', $context);
    }

    /**
     * Obtém a URL do logotipo personalizado UFPel
     *
     * Busca a configuração do logotipo no painel administrativo
     * e retorna sua URL se estiver configurado.
     *
     * @return string|null URL do logotipo ou null se não configurado
     */
    private function get_ufpel_logo_url() {
        $logo = $this->page->theme->setting_file_url('logo', 'logo');
        return $logo ? $logo->out() : null;
    }

    /**
     * Renderiza o cabeçalho da página com melhorias UFPel
     *
     * Adiciona elementos específicos do tema UFPel ao cabeçalho,
     * incluindo meta tags para acessibilidade e SEO.
     *
     * @return string HTML do cabeçalho renderizado
     */
    public function standard_head_html() {
        global $CFG, $SESSION;

        // Obtém o HTML padrão do cabeçalho
        $output = parent::standard_head_html();

        // Adiciona meta tags específicas do tema UFPel
        $output .= '<meta name="theme-color" content="#00408F">' . "\n";
        $output .= '<meta name="msapplication-navbutton-color" content="#00408F">' . "\n";
        $output .= '<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">' . "\n";
        
        // Adiciona favicon personalizado se configurado
        $favicon = $this->get_ufpel_favicon_url();
        if ($favicon) {
            $output .= '<link rel="icon" type="image/x-icon" href="' . $favicon . '">' . "\n";
            $output .= '<link rel="shortcut icon" type="image/x-icon" href="' . $favicon . '">' . "\n";
        }

        // Adiciona preconnect para melhor performance
        $output .= '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
        $output .= '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";

        return $output;
    }

    /**
     * Obtém a URL do favicon personalizado UFPel
     *
     * @return string|null URL do favicon ou null se não configurado
     */
    private function get_ufpel_favicon_url() {
        $favicon = $this->page->theme->setting_file_url('favicon', 'favicon');
        return $favicon ? $favicon->out() : null;
    }

    /**
     * Renderiza o rodapé com informações institucionais UFPel
     *
     * Adiciona informações específicas da UFPel ao rodapé padrão
     * mantendo a estrutura base do tema Boost.
     *
     * @return string HTML do rodapé renderizado
     */
    public function standard_footer_html() {
        global $CFG;

        $output = parent::standard_footer_html();
        
        // Adiciona informações institucionais UFPel
        $ufpel_footer = $this->render_ufpel_footer_info();
        
        // Insere as informações UFPel antes do fechamento do rodapé
        $output = str_replace('</footer>', $ufpel_footer . '</footer>', $output);

        return $output;
    }

    /**
     * Renderiza informações institucionais para o rodapé
     *
     * @return string HTML das informações institucionais
     */
    private function render_ufpel_footer_info() {
        $context = new stdClass();
        $context->current_year = date('Y');
        $context->institution_name = 'Universidade Federal de Pelotas';
        $context->institution_url = 'https://ufpel.edu.br';
        $context->currentmonth => userdate(time(), '%B');
        
        return $this->render_from_template('theme_ufpel/footer_info', $context);
    }

    /**
     * Renderiza blocos com estilos aprimorados UFPel
     *
     * Sobrescreve a renderização de blocos para aplicar
     * estilos personalizados do tema UFPel.
     *
     * @param block_contents $bc Conteúdo do bloco
     * @return string HTML do bloco renderizado
     */
    public function block(block_contents $bc, $region) {
        // Adiciona classes CSS específicas do tema UFPel
        if (!empty($bc->attributes['class'])) {
            $bc->attributes['class'] .= ' ufpel-block';
        } else {
            $bc->attributes['class'] = 'ufpel-block';
        }

        // Adiciona cores institucionais baseadas no tipo de bloco
        if (!empty($bc->blockinstanceid)) {
            $bc->attributes['class'] .= ' ufpel-block-styled';
        }

        return parent::block($bc, $region);
    }

    /**
     * Renderiza mensagens de notificação com estilos UFPel
     *
     * Aplica cores e estilos institucionais às mensagens
     * de notificação do sistema.
     *
     * @param \core\output\notification $notification A notificação
     * @return string HTML da notificação renderizada
     */
    public function render_notification(\core\output\notification $notification) {
        $output = parent::render_notification($notification);
        
        // Adiciona classes específicas do tema UFPel para diferentes tipos de notificação
        $replacements = [
            'alert-success' => 'alert-success ufpel-alert-success',
            'alert-info' => 'alert-info ufpel-alert-info',
            'alert-warning' => 'alert-warning ufpel-alert-warning',
            'alert-danger' => 'alert-danger ufpel-alert-danger'
        ];
        
        foreach ($replacements as $original => $replacement) {
            $output = str_replace($original, $replacement, $output);
        }

        return $output;
    }

    /**
     * Renderiza links de ação com estilos UFPel aprimorados
     *
     * Aplica estilos consistentes com a identidade visual
     * UFPel aos links de ação do sistema.
     *
     * @param action_link $link O link de ação
     * @return string HTML do link renderizado
     */
    public function render_action_link(action_link $link) {
        // Adiciona classes CSS específicas do tema UFPel
        $existing_classes = $link->attributes['class'] ?? '';
        $link->attributes['class'] = trim($existing_classes . ' ufpel-action-link');

        return parent::render_action_link($link);
    }

    /**
     * Renderiza botões com estilos aprimorados UFPel
     *
     * Aplica cores e estilos institucionais aos botões
     * mantendo a acessibilidade WCAG 2.2.
     *
     * @param single_button $button O botão
     * @return string HTML do botão renderizado
     */
    public function render_single_button(single_button $button) {
        // Aplica classes CSS específicas baseadas no tipo de botão
        if (isset($button->class)) {
            if (strpos($button->class, 'btn-primary') !== false) {
                $button->class .= ' ufpel-btn-primary';
            } elseif (strpos($button->class, 'btn-secondary') !== false) {
                $button->class .= ' ufpel-btn-secondary';
            }
        }

        return parent::render_single_button($button);
    }

    /**
     * Adiciona contexto específico do tema UFPel aos templates Mustache
     *
     * Este método é chamado automaticamente pelo sistema de templates
     * para adicionar variáveis específicas do tema aos contextos.
     *
     * @param array $context Contexto existente do template
     * @return array Contexto atualizado com dados UFPel
     */
    public function mustache_template_context($context) {
        global $COURSE, $SITE;

        // Obtém o contexto padrão do tema pai
        $context = parent::mustache_template_context($context);

        // Adiciona configurações do tema UFPel
        $context['ufpel_primary_color'] = get_config('theme_ufpel', 'primarycolor') ?: '#00408F';
        $context['ufpel_secondary_color'] = get_config('theme_ufpel', 'secondarycolor') ?: '#0080FF';
        $context['ufpel_accent_color'] = get_config('theme_ufpel', 'accentcolor') ?: '#F7A600';
        
        // Adiciona URLs de imagens personalizadas
        $context['ufpel_logo'] = $this->get_ufpel_logo_url();
        $context['ufpel_favicon'] = $this->get_ufpel_favicon_url();
        
        // Adiciona informações do site
        $context['sitename'] = format_string($SITE->shortname, true, ['context' => \context_system::instance()]);
        $context['sitefullname'] = format_string($SITE->fullname, true, ['context' => \context_system::instance()]);
        
        // Adiciona flags de configuração
        $context['enablecourseheader'] = get_config('theme_ufpel', 'enablecourseheader') ?? true;
        
        return $context;
    }
}