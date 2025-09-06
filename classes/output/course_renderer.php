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
 * Renderer de cursos personalizado do tema UFPel
 *
 * Este arquivo contém o renderer específico para cursos que implementa
 * customizações na exibição de páginas de curso, incluindo o cabeçalho
 * personalizado com imagem de capa.
 *
 * @package    theme_ufpel
 * @copyright  2025 Universidade Federal de Pelotas
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_ufpel\output;

use stdClass;
use moodle_url;
use context_course;
use course_modinfo;
use core_course_category;

defined('MOODLE_INTERNAL') || die();

/**
 * Renderer personalizado para páginas de curso
 *
 * Herda funcionalidades do renderer padrão e adiciona
 * customizações específicas do tema UFPel para cursos.
 */
class course_renderer extends \core_course_renderer {

    /**
     * Renderiza o cabeçalho personalizado do curso
     *
     * Este método renderiza um cabeçalho atrativo para páginas de curso
     * usando o template course_header.mustache com imagem de capa e
     * informações detalhadas do curso.
     *
     * @param stdClass $course Objeto do curso
     * @return string HTML do cabeçalho do curso renderizado
     */
    public function course_header($course = null) {
        global $COURSE, $DB;

        // Se não foi passado um curso, usa o curso atual
        if ($course === null) {
            $course = $COURSE;
        }

        // Verifica se o cabeçalho personalizado está habilitado
        $enablecourseheader = get_config('theme_ufpel', 'enablecourseheader');
        if (!$enablecourseheader) {
            return parent::course_header();
        }

        // Prepara o contexto para o template Mustache
        $context = $this->prepare_course_header_context($course);

        // Renderiza usando o template personalizado
        return $this->render_from_template('theme_ufpel/course_header', $context);
    }

    /**
     * Prepara o contexto de dados para o template do cabeçalho do curso
     *
     * Coleta todas as informações necessárias sobre o curso
     * para renderização no template Mustache.
     *
     * @param stdClass $course Objeto do curso
     * @return stdClass Contexto preparado para o template
     */
    private function prepare_course_header_context($course) {
        global $DB;

        $context = new stdClass();

        // Informações básicas do curso
        $context->courseid = $course->id;
        $context->coursename = format_string($course->fullname, true, ['context' => \context_course::instance($course->id)]);
        $context->courseshortname = format_string($course->shortname, true, ['context' => \context_course::instance($course->id)]);
        $context->courseurl = new moodle_url('/course/view.php', ['id' => $course->id]);

        // Verifica se o nome abreviado é diferente do nome completo
        $context->coursenameshort_equals_fullname = ($course->shortname === $course->fullname);

        // Obtém a imagem de capa do curso
        $courseimage = $this->get_course_image($course->id);
        if ($courseimage) {
            $context->courseimage = $courseimage->out();
        }

        // Conta participantes do curso
        $context->participantcount = $this->get_course_participant_count($course->id);

        // Obtém informações da categoria
        $category = core_course_category::get($course->category, IGNORE_MISSING);
        if ($category) {
            $context->categoryname = format_string($category->name);
            $context->categoryurl = new moodle_url('/course/index.php', ['categoryid' => $category->id]);
        }

        // Configurações do tema
        $context->enablecourseheader = get_config('theme_ufpel', 'enablecourseheader') ?? true;

        return $context;
    }

    /**
     * Obtém a URL da imagem de capa do curso
     *
     * Busca na área de arquivos do curso por imagens que podem
     * ser usadas como capa do curso.
     *
     * @param int $courseid ID do curso
     * @return moodle_url|null URL da imagem ou null se não encontrada
     */
    private function get_course_image($courseid) {
        global $CFG;
        require_once($CFG->libdir . '/filelib.php');

        $context = context_course::instance($courseid);
        $fs = get_file_storage();
        
        // Busca arquivos na área de resumo do curso (course summary files)
        $files = $fs->get_area_files($context->id, 'course', 'overviewfiles', 0, 'filename', false);
        
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
        
        // Se não encontrou imagem de resumo, busca em outras áreas
        $files = $fs->get_area_files($context->id, 'course', 'images', 0, 'filename', false);
        
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
        
        return null;
    }

    /**
     * Conta o número de participantes no curso
     *
     * Retorna o número total de usuários matriculados no curso,
     * excluindo usuários suspensos.
     *
     * @param int $courseid ID do curso
     * @return int Número de participantes
     */
    private function get_course_participant_count($courseid) {
        global $DB;

        $sql = "SELECT COUNT(DISTINCT u.id)
                FROM {user} u
                JOIN {user_enrolments} ue ON ue.userid = u.id
                JOIN {enrol} e ON e.id = ue.enrolid
                WHERE e.courseid = :courseid 
                AND ue.status = 0 
                AND u.deleted = 0 
                AND u.suspended = 0";

        return $DB->count_records_sql($sql, ['courseid' => $courseid]);
    }

    /**
     * Renderiza a seção de conteúdo do curso com melhorias UFPel
     *
     * Sobrescreve a renderização de seções do curso para aplicar
     * estilos e funcionalidades específicas do tema UFPel.
     *
     * @param stdClass $course Objeto do curso
     * @param int|stdClass|section_info $section Seção do curso
     * @param course_modinfo $modinfo Informações dos módulos do curso
     * @param int $sr Número da seção relativa
     * @param string $displayoptions Opções de exibição
     * @return string HTML da seção renderizada
     */
    public function course_section_cm_list($course, $section, $modinfo, $displayoptions = []) {
        $output = parent::course_section_cm_list($course, $section, $modinfo, $displayoptions);
        
        // Adiciona classes CSS específicas do tema UFPel
        $output = str_replace('class="section-summary-activities"', 
                             'class="section-summary-activities ufpel-course-activities"', 
                             $output);
        
        return $output;
    }

    /**
     * Renderiza módulos do curso com estilos aprimorados
     *
     * Aplica estilos consistentes com a identidade visual UFPel
     * aos módulos/atividades do curso.
     *
     * @param stdClass $course Objeto do curso
     * @param completion_info $completioninfo Informações de conclusão
     * @param cm_info $mod Informações do módulo
     * @param int|null $sectionreturn Seção de retorno
     * @param array $displayoptions Opções de exibição
     * @return string HTML do módulo renderizado
     */
    public function course_section_cm($course, $completioninfo, $mod, $sectionreturn, $displayoptions = []) {
        $output = parent::course_section_cm($course, $completioninfo, $mod, $sectionreturn, $displayoptions);
        
        // Adiciona classes específicas baseadas no tipo de módulo
        $moduletype = $mod->modname;
        $output = str_replace('class="activity ' . $moduletype . '"', 
                             'class="activity ' . $moduletype . ' ufpel-activity ufpel-activity-' . $moduletype . '"', 
                             $output);
        
        return $output;
    }

    /**
     * Renderiza a lista de cursos com layout aprimorado UFPel
     *
     * Sobrescreve a exibição da lista de cursos para aplicar
     * o design institucional UFPel.
     *
     * @param array $courses Array de cursos
     * @param bool $showcategoryname Mostrar nome da categoria
     * @param int $totalcount Total de cursos
     * @param course_in_list $chelper Helper de curso em lista
     * @return string HTML da lista de cursos
     */
    public function view_available_courses($displaytype = null, $courses = null, $totalcount = null) {
        $output = parent::view_available_courses($displaytype, $courses, $totalcount);
        
        // Adiciona classes CSS específicas do tema UFPel
        $output = str_replace('class="courses"', 'class="courses ufpel-courses-grid"', $output);
        $output = str_replace('class="coursebox"', 'class="coursebox ufpel-coursebox"', $output);
        
        return $output;
    }

    /**
     * Renderiza informações de progresso do curso
     *
     * Adiciona elementos visuais específicos do tema UFPel
     * para exibição de progresso e conclusão.
     *
     * @param stdClass $course Objeto do curso
     * @param completion_info $completioninfo Informações de conclusão
     * @return string HTML do progresso renderizado
     */
    public function course_progress_info($course, $completioninfo) {
        global $USER;

        if (!$completioninfo->is_enabled()) {
            return '';
        }

        $context = new stdClass();
        $context->courseid = $course->id;
        
        // Calcula porcentagem de conclusão
        $percentage = progress::get_course_progress_percentage($course, $USER->id);
        if (!is_null($percentage)) {
            $context->progress_percentage = round($percentage);
            $context->has_progress = true;
            
            // Define classes CSS baseadas no progresso
            if ($percentage >= 100) {
                $context->progress_class = 'ufpel-progress-complete';
            } elseif ($percentage >= 75) {
                $context->progress_class = 'ufpel-progress-high';
            } elseif ($percentage >= 50) {
                $context->progress_class = 'ufpel-progress-medium';
            } else {
                $context->progress_class = 'ufpel-progress-low';
            }
        }

        return $this->render_from_template('theme_ufpel/course_progress', $context);
    }

    /**
     * Renderiza breadcrumbs personalizados para páginas de curso
     *
     * Adiciona elementos de navegação específicos do tema UFPel
     * mantendo a acessibilidade WCAG 2.2.
     *
     * @return string HTML dos breadcrumbs renderizados
     */
    public function navbar() {
        $output = parent::navbar();
        
        // Adiciona classes CSS específicas do tema UFPel
        $output = str_replace('class="breadcrumb"', 'class="breadcrumb ufpel-breadcrumb"', $output);
        
        return $output;
    }
}