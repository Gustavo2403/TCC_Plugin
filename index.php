<?php
// Este arquivo faz parte do Moodle - https://moodle.org/
//
// Moodle é um software livre: você pode redistribuí-lo e/ou modificá-lo
 // sob os termos da Licença Pública Geral GNU como publicado pela
// Free Software Foundation, seja a versão 3 da Licença, ou
// (a seu critério) qualquer versão posterior.
//
// O Moodle é distribuído na esperança de que seja útil,
// mas SEM QUALQUER GARANTIA; sem mesmo a garantia implícita de
// COMERCIALIZAÇÃO ou ADEQUAÇÃO A UM DETERMINADO FIM. Veja a
// Licença Pública Geral GNU para mais detalhes.
//
// Você deve ter recebido uma cópia da Licença Pública Geral GNU
// junto com o Moodle. Caso contrário, consulte < https://www.gnu.org/licenses/> ;.

/**
 * @package     local_greetings
 * @copyright   2024 Gustavo <gustavormoreiraflamengo@gmail.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 ou posterior
 */
require_once('../../config.php');
require_once($CFG->dirroot. '/local/greetings/lib.php');

$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_url(new moodle_url('/local/greetings/index.php'));
$PAGE->set_pagelayout('standard');

// Configurar título e cabeçalho
$pluginname = "Notificações";
$PAGE->set_title($pluginname);
$PAGE->set_heading($pluginname);

echo $OUTPUT->header();

// Obter o nome do site
$site = get_site();
$sitefullname = $site->fullname;

// Verificar se o usuário está logado
if (isloggedin()) {
    $username = $USER;
    echo local_greetings_get_greeting($username);
} else {
    // Se não, exibir saudação genérica
    echo get_string('greetinguser', 'local_greetings');
}

echo $OUTPUT->footer();