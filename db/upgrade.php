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
 * This file keeps track of upgrades to the isselfeval module
 *
 * Sometimes, changes between versions involve alterations to database
 * structures and other major things that may break installations. The upgrade
 * function in this file will attempt to perform all the necessary actions to
 * upgrade your older installation to the current version. If there's something
 * it cannot do itself, it will tell you what you need to do.  The commands in
 * here will all be database-neutral, using the functions defined in DLL libraries.
 *
 * @package    mod_isselfeval
 * @copyright  2016 Your Name <your@email.address>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Execute isselfeval upgrade from the given old version
 *
 * @param int $oldversion
 * @return bool
 */
function xmldb_isselfeval_upgrade($oldversion) {
    global $DB;

    $dbman = $DB->get_manager(); // Loads ddl manager and xmldb classes.

    /*
     * And upgrade begins here. For each one, you'll need one
     * block of code similar to the next one. Please, delete
     * this comment lines once this file start handling proper
     * upgrade code.
     *
     * if ($oldversion < YYYYMMDD00) { //New version in version.php
     * }
     *
     * Lines below (this included)  MUST BE DELETED once you get the first version
     * of your module ready to be installed. They are here only
     * for demonstrative purposes and to show how the isselfeval
     * iself has been upgraded.
     *
     * For each upgrade block, the file isselfeval/version.php
     * needs to be updated . Such change allows Moodle to know
     * that this file has to be processed.
     *
     * To know more about how to write correct DB upgrade scripts it's
     * highly recommended to read information available at:
     *   http://docs.moodle.org/en/Development:XMLDB_Documentation
     * and to play with the XMLDB Editor (in the admin menu) and its
     * PHP generation posibilities.
     *
     * First example, some fields were added to install.xml on 2007/04/01
     */
    if ($oldversion < 2007040100) {

        // Define field course to be added to isselfeval.
        $table = new xmldb_table('isselfeval');
        $field = new xmldb_field('course', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'id');

        // Add field course.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field intro to be added to isselfeval.
        $table = new xmldb_table('isselfeval');
        $field = new xmldb_field('intro', XMLDB_TYPE_TEXT, 'medium', null, null, null, null, 'name');

        // Add field intro.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field introformat to be added to isselfeval.
        $table = new xmldb_table('isselfeval');
        $field = new xmldb_field('introformat', XMLDB_TYPE_INTEGER, '4', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0',
            'intro');

        // Add field introformat.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Once we reach this point, we can store the new version and consider the module
        // ... upgraded to the version 2007040100 so the next time this block is skipped.
        upgrade_mod_savepoint(true, 2007040100, 'isselfeval');
    }

    // Second example, some hours later, the same day 2007/04/01
    // ... two more fields and one index were added to install.xml (note the micro increment
    // ... "01" in the last two digits of the version).
    if ($oldversion < 2007040101) {

        // Define field timecreated to be added to isselfeval.
        $table = new xmldb_table('isselfeval');
        $field = new xmldb_field('timecreated', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0',
            'introformat');

        // Add field timecreated.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field timemodified to be added to isselfeval.
        $table = new xmldb_table('isselfeval');
        $field = new xmldb_field('timemodified', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0',
            'timecreated');

        // Add field timemodified.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define index course (not unique) to be added to isselfeval.
        $table = new xmldb_table('isselfeval');
        $index = new xmldb_index('courseindex', XMLDB_INDEX_NOTUNIQUE, array('course'));

        // Add index to course field.
        if (!$dbman->index_exists($table, $index)) {
            $dbman->add_index($table, $index);
        }

        // Another save point reached.
        upgrade_mod_savepoint(true, 2007040101, 'isselfeval');
    }

    // Third example, the next day, 2007/04/02 (with the trailing 00),
    // some actions were performed to install.php related with the module.
    if ($oldversion < 2007040200) {

        // Insert code here to perform some actions (same as in install.php).

        upgrade_mod_savepoint(true, 2007040200, 'isselfeval');
    }

    /*
     * And that's all. Please, examine and understand the 3 example blocks above. Also
     * it's interesting to look how other modules are using this script. Remember that
     * the basic idea is to have "blocks" of code (each one being executed only once,
     * when the module version (version.php) is updated.
     *
     * Lines above (this included) MUST BE DELETED once you get the first version of
     * yout module working. Each time you need to modify something in the module (DB
     * related, you'll raise the version and add one upgrade block here.
     *
     * Finally, return of upgrade result (true, all went good) to Moodle.
     */


     // if ($oldversion < 2018081501) {

    //     // Define field up_down to be added to is_selfeval_consider.
    //     $table = new xmldb_table('is_selfeval_consider');
    //     $field = new xmldb_field('up_down', XMLDB_TYPE_INTEGER, '2', null, XMLDB_NOTNULL, null, '0', 'rubric_11');

    //     // Conditionally launch add field up_down.
    //     if (!$dbman->field_exists($table, $field)) {
    //         $dbman->add_field($table, $field);
    //     }

    //     // Isselfeval savepoint reached.
    //     upgrade_mod_savepoint(true, 2018081501, 'isselfeval');
    // }

    // if ($oldversion < 2018082501) {

    //     // Define field up_down to be dropped from isselfeval_consider.
    //     $table = new xmldb_table('isselfeval_consider');
    //     $field = new xmldb_field('up_down');

    //     // Conditionally launch drop field up_down.
    //     if ($dbman->field_exists($table, $field)) {
    //         $dbman->drop_field($table, $field);
    //     }

    //     // Isselfeval savepoint reached.
    //     upgrade_mod_savepoint(true, 2018082501, 'isselfeval');
    // }

    // if ($oldversion < 2018082502) {

    //     // Define table isselfeval_consider_updown to be created.
    //     $table = new xmldb_table('isselfeval_consider_updown');

    //     // Adding fields to table isselfeval_consider_updown.
    //     $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
    //     $table->add_field('consider_id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);
    //     $table->add_field('rubric_1_updown', XMLDB_TYPE_CHAR, '4', null, null, null, null);
    //     $table->add_field('rubric_2_updown', XMLDB_TYPE_CHAR, '4', null, null, null, null);
    //     $table->add_field('rubric_3_updown', XMLDB_TYPE_CHAR, '4', null, null, null, null);
    //     $table->add_field('rubric_4_updown', XMLDB_TYPE_CHAR, '4', null, null, null, null);
    //     $table->add_field('rubric_5_updown', XMLDB_TYPE_CHAR, '4', null, null, null, null);
    //     $table->add_field('rubric_6_updown', XMLDB_TYPE_CHAR, '4', null, null, null, null);
    //     $table->add_field('rubric_7_updown', XMLDB_TYPE_CHAR, '4', null, null, null, null);
    //     $table->add_field('rubric_8_updown', XMLDB_TYPE_CHAR, '4', null, null, null, null);
    //     $table->add_field('rubric_9_updown', XMLDB_TYPE_CHAR, '4', null, null, null, null);
    //     $table->add_field('rubric_10_updown', XMLDB_TYPE_CHAR, '4', null, null, null, null);
    //     $table->add_field('rubric_11_updown', XMLDB_TYPE_CHAR, '4', null, null, null, null);
    //     $table->add_field('timecreated', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);
    //     $table->add_field('timemodified', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0');

    //     // Adding keys to table isselfeval_consider_updown.
    //     $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));
    //     $table->add_key('consider_id', XMLDB_KEY_FOREIGN, array('consider_id'), 'isselfeval_consider', array('id'));

    //     // Conditionally launch create table for isselfeval_consider_updown.
    //     if (!$dbman->table_exists($table)) {
    //         $dbman->create_table($table);
    //     }

    //     // Isselfeval savepoint reached.
    //     upgrade_mod_savepoint(true, 2018082502, 'isselfeval');
    // }

    // if ($oldversion < 2018082503) {

    //     // Define field user_id to be added to isselfeval_consider_updown.
    //     $table = new xmldb_table('isselfeval_consider_updown');
    //     $field = new xmldb_field('user_id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null, 'id');

    //     // Conditionally launch add field user_id.
    //     if (!$dbman->field_exists($table, $field)) {
    //         $dbman->add_field($table, $field);
    //     }

    //     // Isselfeval savepoint reached.
    //     upgrade_mod_savepoint(true, 2018082503, 'isselfeval');
    // }

    // if ($oldversion < 2018082504) {

    //     // Define field isselfeval_id to be added to isselfeval_consider_updown.
    //     $table = new xmldb_table('isselfeval_consider_updown');
    //     $field = new xmldb_field('isselfeval_id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null, 'user_id');

    //     // Conditionally launch add field isselfeval_id.
    //     if (!$dbman->field_exists($table, $field)) {
    //         $dbman->add_field($table, $field);
    //     }

    //     // Isselfeval savepoint reached.
    //     upgrade_mod_savepoint(true, 2018082504, 'isselfeval');
    // }

    return true;
}
