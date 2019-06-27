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
 * Prints a particular instance of isselfeval
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package    mod_isselfeval
 * @copyright  2016 Your Name <your@email.address>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Replace isselfeval with the name of your module and remove this line.

require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
require_once(dirname(__FILE__).'/lib.php');

$id = optional_param('id', 0, PARAM_INT); // Course_module ID, or
$n  = optional_param('n', 0, PARAM_INT);  // ... isselfeval instance ID - it should be named as the first character of the module.

if ($id) {
    $cm         = get_coursemodule_from_id('isselfeval', $id, 0, false, MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
    $isselfeval  = $DB->get_record('isselfeval', array('id' => $cm->instance), '*', MUST_EXIST);
} else if ($n) {
    $isselfeval  = $DB->get_record('isselfeval', array('id' => $n), '*', MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $isselfeval->course), '*', MUST_EXIST);
    $cm         = get_coursemodule_from_instance('isselfeval', $isselfeval->id, $course->id, false, MUST_EXIST);
} else {
    error('You must specify a course_module ID or an instance ID');
}

require_login($course, true, $cm);

$event = \mod_isselfeval\event\course_module_viewed::create(array(
    'objectid' => $PAGE->cm->instance,
    'context' => $PAGE->context,
));
$event->add_record_snapshot('course', $PAGE->course);
$event->add_record_snapshot($PAGE->cm->modname, $isselfeval);
$event->trigger();

// Print the page header.

$PAGE->set_url('/mod/isselfeval/view.php', array('id' => $cm->id));
$PAGE->set_title(format_string($isselfeval->name));
$PAGE->set_heading(format_string($course->fullname));

/*
 * Other things you may want to set - remove if not needed.
 * $PAGE->set_cacheable(false);
 * $PAGE->set_focuscontrol('some-html-id');
 * $PAGE->add_body_class('isselfeval-'.$somevar);
 */

// Output starts here.
echo $OUTPUT->header();

// Conditions to show the intro can change to look for own settings or whatever.
if ($isselfeval->intro) {
    echo $OUTPUT->box(format_module_intro('isselfeval', $isselfeval, $cm->id), 'generalbox mod_introbox', 'isselfevalintro');
}

//追記部分
// 各種変数の設定
$composite_key = array('user_id' => $USER->id, 'isselfeval_id' => $isselfeval->id);
$context = context_course::instance($course->id);
$roles   = get_user_roles($context, $USER->id);
$teacher = array_filter($roles, function ($role) {
    return preg_match('/teacher/i', $role->shortname);
});
// DB登録の読み込み
include_once './locallib.php';

if (count($teacher) > 0):
    // if teacher => teacher_view
    require_once("{$CFG->dirroot}/mod/isselfeval/teachers_view.php");

else:
    // not teacher
    if (isset($_POST['consider_edit'])) :
        // consider_editのボタンが押されたとき
        require_once("{$CFG->dirroot}/mod/isselfeval/selfeval_consider.php");

    elseif (isset($_POST['consider_submit'])) :
        // considerの登録ボタンが押された時

        // POSTされたデータの処理
        $records = new stdClass();
        $records->user_id = $USER->id;
        $records->isselfeval_id = $isselfeval->id;
        for ($i=1; $i < 12; $i++) {
            $records->{"rubric_{$i}"}           = optional_param("rubric_{$i}",         NULL, PARAM_TEXT);
            $records->{"rubric_{$i}_updown"}    = optional_param("rubric_{$i}_updown",  NULL, PARAM_TEXT);
        }

        // considerのDB登録
        if (isselfeval_consider_upsert($records)):
            // success upsert
        else:
            // failed
        endif;
        
        // consider_updownの登録
        if (isselfeval_consider_updown_upsert($records)):
            // success upsert
        else:
            // failed
        endif;

        // resultの表示
        require_once("{$CFG->dirroot}/mod/isselfeval/selfeval_result.php");

    elseif(isset($_POST['rubrics_submit'])):
        // rubricの登録ボタンが押された時

        // POSTされたデータの処理
        $records = new stdClass();
        $records->user_id = $USER->id;
        $records->isselfeval_id = $isselfeval->id;
        foreach ($_POST as $name => $value):
            $records->$name = $value;
        endforeach;
        
        // rubricsのDB登録
        if (isselfeval_rubrics_upsert($records)):
            // success upsert
        else:
            // failed
        endif;

        // considerの登録を行うかどうか
        $consider_flg_sql = 'SELECT * FROM {isselfeval_rubrics} WHERE user_id = ? AND isselfeval_id = (SELECT id from {isselfeval} WHERE year = ? AND subject = ? AND times < ? ORDER BY times DESC LIMIT 1);';
        $consider_flg     = $DB->get_record_sql($consider_flg_sql, array($USER->id, $isselfeval->year, $isselfeval->subject, $isselfeval->times));
        if(!$consider_flg):
            // 初回の場合
            // resultの表示
            require_once("{$CFG->dirroot}/mod/isselfeval/selfeval_result.php");
        
        else:
            // 2回目以降の場合
            // considerの表示
            require_once("{$CFG->dirroot}/mod/isselfeval/selfeval_consider.php");

        endif;

    elseif($DB->get_record('isselfeval_rubrics', $composite_key)):
        // 既にDBにrubricsが登録してある場合
        // resultの表示
        require_once("{$CFG->dirroot}/mod/isselfeval/selfeval_result.php");

    else:
        // それ以外の場合
        // formの表示
        require_once("{$CFG->dirroot}/mod/isselfeval/selfeval_form.php");

    endif;
endif;

// Finish the page.
echo $OUTPUT->footer();
