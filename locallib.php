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
 * Internal library of functions for module isselfeval
 *
 * All the isselfeval specific functions, needed to implement the module
 * logic, should go here. Never include this file from your lib.php!
 *
 * @package    mod_isselfeval
 * @copyright  2016 Your Name <your@email.address>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/*
 * Does something really useful with the passed things
 *
 * @param array $things
 * @return object
 *function isselfeval_do_something_useful(array $things) {
 *    return new stdClass();
 *}
 */

 function isselfeval_rubrics_upsert($input){
     global $DB, $composite_key;

     if($record = $DB->get_record('isselfeval_rubrics', $composite_key)):   // 既にDBにデータが登録されている時
        foreach ($input as $key => $value):
            $record->$key = $value;
        endforeach;
        $record->timemodified = time();

        return $DB->update_record('isselfeval_rubrics', $record);
        
    else:   //新規登録
        $record = $input;
        $record->timecreated = time();

        return $DB->insert_record('isselfeval_rubrics', $record);
    endif;
 }

 function isselfeval_consider_upsert($input){
     global $DB, $composite_key;

     if($record = $DB->get_record('isselfeval_consider', $composite_key)):   // 既にDBにデータが登録されている時
        foreach ($input as $key => $value):
            $record->$key = $value;
        endforeach;
        $record->timemodified = time();

        return $DB->update_record('isselfeval_consider', $record);
        
    else:   //新規登録
        $record = $input;
        $record->timecreated = time();

        return $DB->insert_record('isselfeval_consider', $record);
    endif;

 }

 function isselfeval_consider_updown_upsert($input){
     global $DB, $composite_key;
     
     $consider_records = $DB->get_record('isselfeval_consider', $composite_key);

     if($record = $DB->get_record('isselfeval_consider_updown', $composite_key)):   // 既にDBにデータが登録されている時
        foreach ($input as $key => $value):
            $record->$key = $value;
        endforeach;
        $record->timemodified = time();

        return $DB->update_record('isselfeval_consider_updown', $record);
        
    else:   //新規登録
        $record = $input;
        $record->consider_id = $consider_records->id;
        $record->timecreated = time();

        return $DB->insert_record('isselfeval_consider_updown', $record);
    endif;

 }
