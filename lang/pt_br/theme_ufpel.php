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
 * sendo o idioma principal da instituição. Compatível com Moodle 5.x.
 *
 * @package    theme_ufpel
 * @copyright  2025 Universidade Federal de Pelotas
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Informações básicas do tema
$string['pluginname'] = 'UFPel';
$string['themename'] = 'Tema UFPel';
$string['themedescription'] = 'Tema personalizado para a Universidade Federal de Pelotas (UFPel), baseado no tema Boost com identidade visual institucional e recursos aprimorados de acessibilidade compatível com Moodle 5.x.';

// Configurações gerais
$string['configtitle'] = 'Configurações do Tema UFPel';
$string['choosereadme'] = 'UFPel é um tema moderno construído sobre o Boost, projetado especificamente para a Universidade Federal de Pelotas com cores e identidade visual institucional compatível com Moodle 5.x.';

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
$string['loginbackground'] = 'Imagem de Fundo do Login';
$string['loginbackground_desc'] = 'Envie uma imagem de fundo personalizada para a página de login.';

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
$string['enableperformanceoptimization'] = 'Habilitar Otimização de Performance';
$string['enableperformanceoptimization_desc'] = 'Habilita otimizações de CSS e JavaScript para melhor performance.';
$string['enabledarkmode'] = 'Habilitar Modo Escuro';
$string['enabledarkmode_desc'] = 'Habilita suporte ao modo escuro (funcionalidade em desenvolvimento).';
$string['customjs'] = 'JavaScript Personalizado';
$string['customjs_desc'] = 'Adicione código JavaScript personalizado que será executado em todas as páginas.';

// Configurações de acessibilidade
$string['accessibilitysettings'] = 'Configurações de Acessibilidade';
$string['enablehighcontrast'] = 'Habilitar Alto Contraste';
$string['enablehighcontrast_desc'] = 'Habilita modo de alto contraste para melhor acessibilidade.';
$string['fontsize'] = 'Tamanho da Fonte';
$string['fontsize_desc'] = 'Define o tamanho base da fonte para melhor legibilidade.';
$string['fontsize_small'] = 'Pequena';
$string['fontsize_normal'] = 'Normal';
$string['fontsize_large'] = 'Grande';
$string['fontsize_xlarge'] = 'Extra Grande';
$string['enablereducedmotion'] = 'Reduzir Movimento';
$string['enablereducedmotion_desc'] = 'Reduz animações e transições para usuários sensíveis ao movimento.';

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

// Strings do rodapé
$string['allrightsreserved'] = 'Todos os direitos reservados';
$string['quicklinks'] = 'Links rápidos';
$string['institutionalsite'] = 'Site institucional';
$string['library'] = 'Biblioteca';
$string['support'] = 'Suporte';
$string['accessibility'] = 'Acessibilidade';
$string['wcagcompliant'] = 'Compatível com WCAG 2.2';
$string['responsive'] = 'Design responsivo';
$string['accessibilitypolicy'] = 'Política de acessibilidade';
$string['poweredby'] = 'Desenvolvido com';
$string['themeversion'] = 'Versão do tema';
$string['lastupdate'] = 'Última atualização';

// Strings de progresso do curso
$string['courseprogress'] = 'Progresso do Curso';
$string['progresspercentage'] = 'Porcentagem de progresso';
$string['milestone25'] = 'Marco de 25% concluído';
$string['milestone50'] = 'Marco de 50% concluído';
$string['milestone75'] = 'Marco de 75% concluído';
$string['milestone100'] = 'Marco de 100% concluído';
$string['completed'] = 'concluídas';
$string['total'] = 'total';
$string['remaining'] = 'restante';

// Strings para informações do tema
$string['themeinfo'] = 'Informações do Tema';
$string['themeinfo_desc'] = 'Este tema foi desenvolvido especificamente para a Universidade Federal de Pelotas (UFPel) com foco em acessibilidade, usabilidade e identidade visual institucional.';
$string['compatible_moodle5'] = 'Compatível com Moodle 5.x';
$string['documentation'] = 'Documentação';
$string['documentation_desc'] = 'Para mais informações sobre o uso e configuração do tema, consulte a documentação oficial em: https://moodle.ufpel.edu.br/docs/theme-ufpel';

// Strings de atividades e cursos
$string['activitycompleted'] = 'Atividade concluída';
$string['activitynotcompleted'] = 'Atividade não concluída';
$string['coursecategory'] = 'Categoria do curso';
$string['courseparticipants'] = 'Participantes do curso';
$string['courseimage'] = 'Imagem do curso';

// Strings de formulários
$string['required'] = 'Obrigatório';
$string['optional'] = 'Opcional';
$string['save'] = 'Salvar';
$string['cancel'] = 'Cancelar';
$string['edit'] = 'Editar';
$string['delete'] = 'Excluir';
$string['confirm'] = 'Confirmar';

// Strings de mensagens
$string['success'] = 'Sucesso';
$string['error'] = 'Erro';
$string['warning'] = 'Aviso';
$string['info'] = 'Informação';
$string['loading'] = 'Carregando...';
$string['nodata'] = 'Nenhum dado disponível';

// Strings de tempo
$string['today'] = 'Hoje';
$string['yesterday'] = 'Ontem';
$string['thisweek'] = 'Esta semana';
$string['lastweek'] = 'Semana passada';
$string['thismonth'] = 'Este mês';
$string['lastmonth'] = 'Mês passado';

// Strings de layout responsivo
$string['mobilemenu'] = 'Menu móvel';
$string['showmenu'] = 'Mostrar menu';
$string['hidemenu'] = 'Ocultar menu';
$string['togglenavigation'] = 'Alternar navegação';

// Strings de customização
$string['customcss'] = 'CSS Personalizado';
$string['customcss_desc'] = 'Adicione CSS personalizado que será aplicado em todas as páginas.';
$string['customlogo'] = 'Logotipo Personalizado';
$string['customlogo_desc'] = 'Faça upload de um logotipo personalizado para substituir o logotipo padrão.';

// Strings de performance
$string['performance'] = 'Performance';
$string['cacheenabled'] = 'Cache habilitado';
$string['cachedisabled'] = 'Cache desabilitado';
$string['optimized'] = 'Otimizado';

// Strings de modo escuro
$string['darkmode'] = 'Modo Escuro';
$string['lightmode'] = 'Modo Claro';
$string['systemmode'] = 'Seguir sistema';
$string['toggletheme'] = 'Alternar tema';

// Privacy API strings
$string['privacy:metadata'] = 'O tema UFPel não armazena dados pessoais dos usuários.';

// Strings para cookies e LGPD
$string['cookieconsent'] = 'Consentimento de Cookies';
$string['cookieconsent_desc'] = 'Este site utiliza cookies para melhorar sua experiência de navegação.';
$string['acceptcookies'] = 'Aceitar Cookies';
$string['managecookies'] = 'Gerenciar Cookies';

// Strings de contato e suporte
$string['contact'] = 'Contato';
$string['phone'] = 'Telefone';
$string['email'] = 'E-mail';
$string['address'] = 'Endereço';
$string['supportcenter'] = 'Central de Suporte';
$string['technicalissues'] = 'Problemas Técnicos';
$string['reportbug'] = 'Reportar Bug';

// Strings específicas da UFPel
$string['ufpel_full_name'] = 'Universidade Federal de Pelotas';
$string['ufpel_acronym'] = 'UFPel';
$string['ufpel_slogan'] = 'Conhecimento que transforma';
$string['ufpel_address'] = 'Rua Gomes Carneiro, 1 - Centro, Pelotas - RS';
$string['ufpel_phone'] = '+55 (53) 3284-8000';
$string['ufpel_email'] = 'moodle@ufpel.edu.br';