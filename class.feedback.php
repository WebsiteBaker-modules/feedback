<?php

/**
  Module developed for the Open Source Content Management System Website Baker (http://websitebaker.org)
  Copyright (c) 2008, Ralf Hertsch
  Contact me: hertsch(at)berlin.de, http://ralf-hertsch.de

  This module is free software. You can redistribute it and/or modify it
  under the terms of the GNU General Public License  - version 2 or later,
  as published by the Free Software Foundation: http://www.gnu.org/licenses/gpl.html.

  This module is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.
**/

require_once('class.usecaptcha.php');


/**
 * Sortierfunktionen fuer die Feedbacks
 *
 */
function cmpAscending($a, $b) {
  if ($a['timestamp'] == $b['timestamp']) { return 0; }
  return ($a['timestamp'] < $b['timestamp']) ? -1 : 1;
}

function cmpDescending($a, $b) {
  if ($a['timestamp'] == $b['timestamp']) { return 0; }
  return ($a['timestamp'] < $b['timestamp']) ? 1 : -1;
}

class sql_feedback {

  var $data;
  var $record;
  var $error;

  /**
   * Constructor
   *
   * @return sql_feedback
   */
  public function __construct() {
    $this->data = array();
    $this->record = array();
    $this->error = fb_error_no_error;
  }

  /**
   * Erzeugt die Feedback Tabelle
   *
   * @return BOOL
   */
  function sql_createTable() {
    global $database;
    $thisQuery = 'CREATE TABLE `' .TABLE_PREFIX .'mod_feedback` ( '
        . '`section_id` INT(11) NOT NULL DEFAULT \'0\','
        . '`page_id` INT(11) NOT NULl DEFAULT \'0\','
        . '`id` INT(11) NOT NULL AUTO_INCREMENT,'
        . '`name` VARCHAR(50) NOT NULL DEFAULT \'\','
        . '`email` VARCHAR(50) NOT NULL DEFAULT \'\','
        . '`header` VARCHAR(50) NOT NULL DEFAULT \'\','
        . '`feedback` TEXT NOT NULL,'
        . '`timestamp` INT(11) NOT NULL DEFAULT \'0\','
        . '`comment` TEXT NOT NULL,'
        . '`comment_from` VARCHAR(50) NOT NULL DEFAULT \'\','
        . '`comment_mail` VARCHAR(50) NOT NULL DEFAULT \'\','
        . '`comment_date` INT(11) NOT NULL DEFAULT \'0\','
        . '`active` TINYINT(1) NOT NULL DEFAULT \'1\','
        . '`activation_code` VARCHAR(50) NOT NULL DEFAULT \'\','
        . '`activation_stamp` INT(11) NOT NULL DEFAULT \'0\','
        . 'PRIMARY KEY (`id`)'
        . ' )';
      $oldErrorReporting = error_reporting(0);
    $database->query($thisQuery);
    error_reporting($oldErrorReporting);
    if ($database->is_error()) {
      $this->error = sprintf(fb_error_create_table, 'sql_createTable()', $database->get_error());
      return false;  }
    else {
      return true;  }
  }

  /**
   * Loescht die Feedback Tabelle
   *
   * @return BOOL
   */
  function sql_deleteTable() {
    global $database;
    $thisQuery = "DROP TABLE ".TABLE_PREFIX."mod_feedback";
    $oldErrorReporting = error_reporting(0);
    $database->query($thisQuery);
    error_reporting($oldErrorReporting);
    if ($database->is_error()) {
      $this->error = sprintf(fb_error_delete_table, 'sql_deleteTable()', $database->get_error());
      return false;  }
    else {
      return true;  }
  }

  /**
   * Fuegt einen neuen Datensatz ein
   * Erwartet *ALLE* Daten in $this->record[]
   *
   * @param unknown_type $sectionID
   * @param unknown_type $pageID
   */
  function sql_addEntry() {
    global $database;
    $thisQuery = "INSERT INTO ".TABLE_PREFIX."mod_feedback SET "
      . "section_id='".$this->record['section_id']."',"
      . "page_id='".$this->record['page_id']."',"
      . "name='".$this->record['name']."',"
      . "email='".$this->record['email']."',"
      . "header='".$this->record['header']."',"
      . "feedback='".$this->record['feedback']."',"
      . "timestamp='".time()."',"
      . "comment='',"
      . "active='".$this->record['active']."',"
      . "activation_code='".$this->record['activation_code']."',"
      . "activation_stamp='".time()."'";
    $oldErrorReporting = error_reporting(0);
    $database->query($thisQuery);
    error_reporting($oldErrorReporting);
    if ($database->is_error()) {
      $this->error = sprintf(fb_error_add_record, 'sql_addEntry()', $database->get_error());
      return false;  }
    else {
      return true; }
  }

  /**
   * Aktualisiert den Datensatz ID
   * Erwartet *ALLE* Daten in $this->record[]
   *
   * @param INT $ID
   * @return BOOL
   */
  function sql_updateEntry($ID) {
    global $database;
    $thisQuery = "UPDATE ".TABLE_PREFIX."mod_feedback SET "
      . "name='".$this->record['name']."',"
      . "email='".$this->record['email']."',"
      . "header='".$this->record['header']."',"
      . "feedback='".$this->record['feedback']."',"
      . "comment='".$this->record['comment']."',"
      . "comment_from='".$this->record['comment_from']."',"
      . "comment_mail='".$this->record['comment_mail']."',"
      . "comment_date='".$this->record['comment_date']."',"
      . "active='".$this->record['active']."',"
      . "activation_code='".$this->record['activation_code']."',"
      . "activation_stamp='".$this->record['activation_stamp']."'"
      . " WHERE id='".$ID."'";
    $oldErrorReporting = error_reporting(0);
    $database->query($thisQuery);
    error_reporting($oldErrorReporting);
    if ($database->is_error()) {
      // SQL Fehler
      $this->error = sprintf(fb_error_update_record, 'sql_updateEntry()', $database->get_error());
      return false;  }
    else {
      return true;  }
  }

  /**
   * Loescht alle Eintraege die $section_id zugeordnet sind
   *
   * @param INT $section_id
   * @return BOOL
   */
  function sql_deleteEntryBySection($section_id) {
    global $database;
    $thisQuery = "DELETE FROM ".TABLE_PREFIX."mod_feedback WHERE section_id='$section_id'";
    $oldErrorReporting = error_reporting(0);
    $database->query($thisQuery);
    error_reporting($oldErrorReporting);
    if ($database->is_error()) {
      // SQL Fehler
      $this->error = sprintf(fb_error_delete_record, 'sql_deleteEntryBySection()', $database->get_error());
      return false;  }
    else {
      return true;  }
  }

  /**
   * Loescht den Eintrag ID
   *
   * @param INT $id
   * @return BOOL
   */
  function sql_deleteEntryByID($id) {
    global $database;
    $thisQuery = "DELETE FROM ".TABLE_PREFIX."mod_feedback WHERE id='$id'";
    $oldErrorReporting = error_reporting(0);
    $database->query($thisQuery);
    error_reporting($oldErrorReporting);
    if ($database->is_error()) {
      // SQL Fehler
      $this->error = sprintf(fb_error_delete_record, 'sql_deleteEntryByID()', $database->get_error());
      return false;  }
    else {
      return true;  }
  }

  /**
   * Funktion ueberprueft, ob der Datensatz bereits existiert,
   * soll insbesondere mehrfache Eintraege durch erneutes Laden von
   * Seiten verhindern.
   * Erwartet ALLE DATEN in $this->record[]
   * Gibt FALSE zurueck, wenn KEINE DOUBLETTE EXISTIERT,
   * gibt TRUE zurueck, wenn der EINTRAG BEREITS EXISTIERT !!!
   *
   * @return BOOL
   */
  function sql_isBodyDouble() {
    global $database;
    global $sql_result;
    $thisQuery = "SELECT * FROM ".TABLE_PREFIX."mod_feedback WHERE section_id='".$this->record['section_id']."' AND page_id='".$this->record['page_id']."' AND email='".$this->record['email']."' AND feedback='".$this->record['feedback']."'";
    $oldErrorReporting = error_reporting(0);
    $sql_result = $database->query($thisQuery);
    error_reporting($oldErrorReporting);
    if ($database->is_error()) {
      // SQL Fehler, Rueckgabe ist TRUE !!!
      $this->error = sprintf(fb_error_reading_records, 'sql_isBodyDouble()', $database->get_error());
      return true; }
    elseif ($sql_result->numRows() > 0) {
      // Datensatz existiert offensichtlich schon, Rueckgabe ist TRUE !!!
      $this->error = fb_error_double_body;
      return true; }
    else {
      // keine Daten, alles in Ordnung!!! Rueckgabe ist FALSE !!!
      return false;  }
  }

  /**
   * Liest Datensaetze zu der angegebenen $page_id und $section_id aus
   * Rueckgabe TRUE, wenn Datensaetze vorhanden sind,
   * FALSE, wenn keine Datensaetze vorhanden oder bei SQL FEHLER
   *
   * @param INT $page_id
   * @param INT $section_id
   * @return BOOL
   */
  function sql_getEntries($page_id, $section_id) {
    global $database;
    global $sql_result;
    $thisQuery = "SELECT * FROM ".TABLE_PREFIX."mod_feedback WHERE section_id='$section_id' AND page_id='$page_id'";
    $oldErrorReporting = error_reporting(0);
    $sql_result = $database->query($thisQuery);
    error_reporting($oldErrorReporting);
    if ($database->is_error()) {
      // SQL Fehler
      $this->error = sprintf(fb_error_reading_records, 'sql_getEntries()', $database->get_error());
      return false;  }
    elseif ($sql_result->numRows() > 0) {
      // Es gibt mindestens einen Eintrag
      $numRows = $sql_result->numRows();
      $this->data = array();
      for ($i=0; $i < $numRows; $i++) {
        $this->record = $sql_result->fetchRow();
        $this->data[] = $this->record;  }
      return true;
    }
    else {
      // KEINE DATENSAETZE VORHANDEN
      return false;  }
  }

  /**
   * Liest den angegebenen Datensatz ID aus
   *
   * @param INT $id
   * @return BOOL
   */
  function sql_getEntryByID($id) {
    global $database;
    global $sql_result;
    $thisQuery = "SELECT * FROM ".TABLE_PREFIX."mod_feedback WHERE id='$id'";
    $oldErrorReporting = error_reporting(0);
    $sql_result = $database->query($thisQuery);
    error_reporting($oldErrorReporting);
    if ($database->is_error()) {
      // SQL Fehler
      $this->error = sprintf(fb_error_reading_records, 'sql_getEntryByID()', $database->get_error());
      return false; }
    elseif ($sql_result->numRows() > 0) {
      $this->record = $sql_result->fetchRow();
      return true;  }
    else {
      // keine Daten!
      return false;  }
  }

  /**
   * Sortiert das uebergebene Feedback Array AUFSTEIGEND
   *
   * @param ARRAY $thisFeedbacks
   * @return ARRAY
   */
  function sortLatestLast($thisFeedbacks) {
    usort($thisFeedbacks, "cmpAscending");
    return $thisFeedbacks;
  }

  /**
   * Sortiert das uebergebene Feedback Array ABSTEIGEND
   *
   * @param ARRAY $thisFeedbacks
   * @return ARRAY
   */
  function sortLatestFirst($thisFeedbacks) {
    usort($thisFeedbacks, "cmpDescending");
    return $thisFeedbacks;
  }

  /**
   * Fuegt Suchfunktionen fuer das Feedback Modul in der Search Tabelle hinzu
   *
   * @return BOOL
   */
  function sql_addSearchFeature() {
    global $database;
    // Insert info into the search table
    $search_info = array(
        'page_id'                => 'page_id',
        'title'                    => 'page_title',
        'link'                    => 'link',
        'description'          => 'description',
        'modified_when'      => 'modified_when',
        'modfified_by'        => 'modified_by'
      );
    $search_info = serialize($search_info);
    $oldErrorReporting = error_reporting(0);
    $database->query("INSERT INTO " .TABLE_PREFIX ."search (name,value,extra)    VALUES ('module', 'feedback', '$search_info')");
    error_reporting($oldErrorReporting);
    if ($database->is_error()) {
      // SQL Fehler
      $this->error = sprintf(fb_error_add_search_feature, 'sql_addSearchFeature()', $database->get_error());
      return false;  }
    // Query Start
    $query_start_code = "SELECT [TP]pages.page_id, [TP]pages.page_title,    [TP]pages.link, [TP]pages.description,
                           [TP]pages.modified_when, [TP]pages.modified_by    FROM [TP]mod_feedback, [TP]pages WHERE ";
    $oldErrorReporting = error_reporting(0);
    $database->query("INSERT INTO ".TABLE_PREFIX."search (name, value, extra) VALUES ('query_start', '$query_start_code', 'feedback')");
    error_reporting($oldErrorReporting);
    if ($database->is_error()) {
      // SQL Fehler
      $this->error = sprintf(fb_error_add_search_feature, 'sql_addSearchFeature()', $database->get_error());
      return false;  }
    // Query Body
    $query_body_code =
         "[TP]pages.page_id = [TP]mod_feedback.page_id AND [TP]mod_feedback.feedback LIKE \'%[STRING]%\' AND [TP]pages.searching = \'1\'
         OR [TP]pages.page_id = [TP]mod_feedback.page_id AND [TP]mod_feedback.header LIKE \'%[STRING]%\' AND [TP]pages.searching = \'1\'
       OR [TP]pages.page_id = [TP]mod_feedback.page_id AND [TP]mod_feedback.name LIKE \'%[STRING]%\' AND [TP]pages.searching = \'1\'
       OR [TP]pages.page_id = [TP]mod_feedback.page_id AND [TP]mod_feedback.comment LIKE \'%[STRING]%\' AND [TP]pages.searching = \'1\'
       OR [TP]pages.page_id = [TP]mod_feedback.page_id AND [TP]mod_feedback.comment_from LIKE \'%[STRING]%\' AND [TP]pages.searching = \'1\'";
    $oldErrorReporting = error_reporting(0);
    $database->query("INSERT INTO ".TABLE_PREFIX."search (name, value, extra) VALUES ('query_body', '$query_body_code', 'feedback')");
    error_reporting($oldErrorReporting);
    if ($database->is_error()) {
      // SQL Fehler
      $this->error = sprintf(fb_error_add_search_feature, 'sql_addSearchFeature()', $database->get_error());
      return false;  }
    // Query End
    $query_end_code = "";
    $oldErrorReporting = error_reporting(0);
    $database->query("INSERT INTO ".TABLE_PREFIX."search (name, value, extra) VALUES ('query_end', '$query_end_code', 'feedback')");
    error_reporting($oldErrorReporting);
    if ($database->is_error()) {
      // SQL Fehler
      $this->error = sprintf(fb_error_add_search_feature, 'sql_addSearchFeature()', $database->get_error());
      return false;  }
    // Insert a blank row for the search function to work...
    $oldErrorReporting = error_reporting(0);
    $database->query("INSERT INTO ".TABLE_PREFIX."mod_feedback (page_id,section_id, feedback, comment) VALUES ('0','0','','')");
    error_reporting($oldErrorReporting);
    if ($database->is_error()) {
      // SQL Fehler
      $this->error = sprintf(fb_error_add_search_feature, 'sql_addSearchFeature()', $database->get_error());
      return false;  }
    else {
      return true;   }
  }

  /**
   * Entfernt die Suchfunktionen fuer das Feedback Modul
   *
   * @return BOOL
   */
  function sql_removeSearchFeature() {
    global $database;
    $oldErrorReporting = error_reporting(0);
    $database->query("DELETE FROM " .TABLE_PREFIX ."search WHERE name='module' AND value='feedback'");
    error_reporting($oldErrorReporting);
    if ($database->is_error()) {
      // SQL Fehler
      $this->error = sprintf(fb_error_remove_search_feature, 'sql_removeSearchFeature()', $database->get_error());
      return false;  }
    $oldErrorReporting = error_reporting(0);
    $database->query("DELETE FROM " .TABLE_PREFIX ."search WHERE extra='feedback'");
    error_reporting($oldErrorReporting);
    if ($database->is_error()) {
      // SQL Fehler
      $this->error = sprintf(fb_error_remove_search_feature, 'sql_removeSearchFeature()', $database->get_error());
      return false;  }
    else {
      return true; }
  }

} // class sql_feedback

/**
 * Optionen fuer das Feedback-Modul
 *
 */
class sql_feedback_options {

  var $data;
  var $record;
  var $error;
  var $feedbackArray = array('section_id','page_id','latest_first','info_email','comment_footer');

  /**
   * Constructor
   *
   * @return sql_feedback_options
   */
  public function __construct() {
    $this->data = array();
    $this->record = array();
    $this->error = fb_error_no_error;
  }

  /**
   * Erzeugt die Options Tabelle fuer das Feedback-Modul
   *
   * @return BOOL
   */
  function sql_createTable() {
    global $database;
    $thisQuery = 'CREATE TABLE `' .TABLE_PREFIX .'mod_feedback_options` ( '
        . '`section_id` INT(11) NOT NULL DEFAULT \'0\','
        . '`page_id` INT(11) NOT NULl DEFAULT \'0\','
        . '`latest_first` TINYINT(1) NOT NULL DEFAULT \'1\','
        . '`info_email` VARCHAR(50) NOT NULL DEFAULT \'\','
        . '`publish_immediately` TINYINT(1) NOT NULL DEFAULT \'1\','
        . '`comment_footer` TEXT NOT NULL,'
        . 'PRIMARY KEY (`section_id`)'
        . ' )';
      $oldErrorReporting = error_reporting(0);
    $database->query($thisQuery);
    error_reporting($oldErrorReporting);
    if ($database->is_error()) {
      $this->errorPlace = 'sql_createTable()';
      $this->error = $database->get_error();
      return false;  }
    else {
      return true;  }
  }

  /**
   * Loescht die Feedback Tabelle
   *
   * @return BOOL
   */
  function sql_deleteTable() {
    global $database;
    $thisQuery = "DROP TABLE ".TABLE_PREFIX."mod_feedback_options";
    $oldErrorReporting = error_reporting(0);
    $database->query($thisQuery);
    error_reporting($oldErrorReporting);
    if ($database->is_error()) {
      $this->error = sprintf(fb_error_delete_table, 'sql_deleteTable()', $database->get_error());
      return false;  }
    else {
      return true;  }
  }

  /**
   * Fuegt eine neue Seite oder einen neuen Abschnitt in die Tabelle ein
   *
   * @param INT $sectionID
   * @param INT $pageID
   * @return BOOL
   */
  function sql_addEntry($sectionID,$pageID) {
    global $database;
    $thisQuery = "INSERT INTO ".TABLE_PREFIX."mod_feedback_options SET "
      ."section_id='$sectionID',"
      ."page_id='$pageID',"
      ."comment_footer = ''";
    $oldErrorReporting = error_reporting(0);
    $database->query($thisQuery);
    error_reporting($oldErrorReporting);
    if ($database->is_error()) {
      $this->error = sprintf(fb_error_add_record, 'sql_addEntry()', $database->get_error());
      return false; }
    else {
      return true; }
  }

/**
   * Uebernimmt Standardeinstellungen aus der jeweiligen Sprachdatei
   *
   * @param INT $sectionID
   * @return BOOL
   */
  function sql_getDefaults($sectionID) {
    global $database;
    $thisQuery = "UPDATE ".TABLE_PREFIX."mod_feedback_options SET "
      ."latest_first='".fb_cfg_latest_first."',"
      ."info_email='".fb_cfg_info_email."'"
      ." WHERE section_id='$sectionID'";
    $oldErrorReporting = error_reporting(0);
    $database->query($thisQuery);
    error_reporting($oldErrorReporting);
    if ($database->is_error()) {
      $this->error = sprintf(fb_error_get_defaults, 'sql_getDefaults()', $database->get_error());
      return false;  }
    else {
      return true;  }
  }


  /**
   * Loescht einen Eintrag aus der Tabelle
   *
   * @param INT $sectionID
   * @param INT $pageID
   * @return BOOL
   */
  function sql_deleteEntry($sectionID, $pageID) {
    global $database;
    $thisQuery = "DELETE FROM ".TABLE_PREFIX."mod_feedback_options WHERE page_id='$pageID' AND section_id='$sectionID'";
    $oldErrorReporting = error_reporting(0);
    $database->query($thisQuery);
    error_reporting($oldErrorReporting);
    if ($database->is_error()) {
      $this->error = sprintf(fb_error_delete_record, 'sql_deleteEntry()', $database->get_error());
      return false;  }
    else {
      return true;  }
  }

  /**
   * Liest die Optionen fuer die angegebene Seite/Section aus
   * und uebergibt die Werte in $this->record
   *
   * @param INT $page_id
   * @param INT $section_id
   * @return BOOL
   */
  function sql_getOptions($page_id, $section_id) {
    global $database;
    global $sql_result;
    $thisQuery = "SELECT * FROM ".TABLE_PREFIX."mod_feedback_options WHERE page_id='$page_id' AND section_id='$section_id'";
    $oldErrorReporting = error_reporting(0);
    $sql_result = $database->query($thisQuery);
    error_reporting($oldErrorReporting);
    if ($database->is_error()) {
      $this->error = sprintf(fb_error_reading_records, 'sql_getOptions()', $database->get_error());
      return false;  }
    elseif ($sql_result->numRows() > 0) {
      // Eintrag vorhanden
      $this->record = $sql_result->fetchRow();
      return true;  }
    else {
      // KEINE DATEN
      return false;  }
  }

  /**
   * Aktualisiert die Optionen
   * Erwarte ALLE DATEN in $this->record[] !!!!
   *
   * @return BOOL
   */
  function sql_updateOptions() {
    global $database;
    $thisQuery = "UPDATE ".TABLE_PREFIX."mod_feedback_options SET "
      ."latest_first='".$this->record['latest_first']."',"
      ."info_email='".$this->record['info_email']."',"
      ."publish_immediately='".$this->record['publish_immediately']."'"
      ." WHERE section_id='".$this->record['section_id']."'";
    $oldErrorReporting = error_reporting(0);
    $database->query($thisQuery);
    error_reporting($oldErrorReporting);
    if ($database->is_error()) {
      $this->error = sprintf(fb_error_update_record, 'sql_updateOptions()', $database->get_error());
      return false;  }
    else {
      return true;  }
  }

} // class sql_feedback_options


/**
 * Klasse erweitert sql_feedback_options und stellt die Dialoge
 * fuer das Backend --> modify.php bereit
 *
 */

class feedback_modify_dlg extends sql_feedback_options {

  var $page_id;
  var $section_id;
  var $comment;
  var $options;

  /**
   * Constructor
   *
   * @param INT $page_id
   * @param INT $section_id
   * @return feedback_modify_dlg
   */
  public function __construct($page_id, $section_id) { 
    parent::__construct();
    $this->page_id = $page_id;
    $this->section_id = $section_id;
    $this->comment = '';
    // Optionen auslesen
    $this->sql_getOptions($this->page_id, $this->section_id);
    $this->options = $this->record;
  }

  /**
   * Verhindert XSS Cross Site Scripting
   *
   * @param REFERENCE $_REQUEST Array
   * @return $request
   */
    function xssPrevent(&$request) {
      if (is_string($request)) {
        $request = htmlspecialchars($request,ENT_QUOTES);
        $request = strip_tags($request);
        $request = trim($request);
        $request = stripslashes($request);
      }
      return $request;
  } // xssPrevent()

  /**
   * Ereigniskontrolle fuer feedback_modify_dlg
   *
   * @param STR $thisAction
   */
  function action($thisAction='default') {
      $html_allowed = array();
      foreach ($_REQUEST as $key => $value) {
          if (!in_array($key, $html_allowed)) {
              $_REQUEST[$key] = $this->xssPrevent($value);
          }
      }
    if (isset($_REQUEST['fb_action'])) {
      $thisAction = $_REQUEST['fb_action'];  }
    switch ($thisAction):
    case 'activate':
      $this->comment = $this->activateFeedback();
      $this->showDialog();
      break;
    case 'edit':
      $this->comment = $this->dlgEdit();
      $this->showDialog();
      break;
    case 'save_edit':
      $this->comment = $this->saveEdit();
      $this->showDialog();
      break;
    case 'comment':
      $this->comment = $this->dlgComment();
      $this->showDialog();
      break;
    case 'help':
      $this->showDialog(true);
      break;
    case 'save_comment':
      $this->comment = $this->saveComment();
      $this->showDialog();
      break;
    case 'delete':
      $feedbacks = new sql_feedback();
      if ($feedbacks->sql_deleteEntryByID($_REQUEST['fb_id'])) {
        $this->comment = sprintf(fb_backend_success_delete, $_REQUEST['fb_id']);  }
      else {
        $this->comment = $feedbacks->error;  }
      $this->showDialog();
      break;
    case 'save':
      // Aenderungen der Optionen uebernehmen
      $this->record = array();
      $this->record['page_id'] = $this->page_id;
      $this->record['section_id'] = $this->section_id;
      // latest_first
      isset($_REQUEST['latest_first']) ? $this->record['latest_first'] = 1 : $this->record['latest_first'] = 0;
      // publish immediately
      isset($_REQUEST['publish_immediately']) ? $this->record['publish_immediately'] = 1 : $this->record['publish_immediately'] = 0;
      // info_email
      $this->record['info_email'] = $_REQUEST['info_email'];
      if ($this->sql_updateOptions()) {
        $this->comment = fb_backend_options_updated;  }
      else {
        $this->comment = $this->error;   }
      // Optionen wieder auslesen
      $this->sql_getOptions($this->page_id, $this->section_id);
      $this->options = $this->record;
      $this->showDialog();
      break;
    default:
      $this->showDialog();
      break;
    endswitch;
  }

  /**
   * Sichert ein bearbeites Feedback
   *
   * @return STR
   */
  function saveEdit() {
    global $admin;
    $feedbacks = new sql_feedback();
    // alten Datensatz holen
    $check = $feedbacks->sql_getEntryByID($_REQUEST['fb_id']);
    if ((!$check) && ($feedbacks->error != fb_error_no_error)) {
      // SQL Fehler
      return $feedbacks->error;   }
    elseif ((!$check) && ($feedbacks->error == fb_error_no_error)) {
      // Datensatz existiert nicht!
      return sprintf(fb_error_record_not_exists, $_REQUEST['fb_id']);  }
    // Neue Daten uebernehmen
    $feedbacks->record['header'] = $_REQUEST['fb_header'];
    $feedbacks->record['feedback'] = $_REQUEST['fb_text'];
    $feedbacks->record['comment'] = $_REQUEST['fb_comment'];
    if (!empty($feedbacks->record['comment'])) {
      $feedbacks->record['comment_from'] = $admin->get_display_name();
      $feedbacks->record['comment_mail'] = $admin->get_email();
      $feedbacks->record['comment_date'] = time();  }
    else {
      $feedbacks->record['comment_from'] = '';
      $feedbacks->record['comment_mail'] = '';
      $feedbacks->record['comment_date'] = '';  }
    if (!$feedbacks->sql_updateEntry($_REQUEST['fb_id'])) {
      return $feedbacks->error;  }
    else {
      return sprintf(fb_backend_success_update, $_REQUEST['fb_id']);   }
  }

  /**
   * Ein Feedback bearbeiten
   * Gibt den Dialog als STR zurueck
   *
   * @return STR
   */
  function dlgEdit() {
    // Datensatz auslesen
    $feedbacks = new sql_feedback();
    $check = $feedbacks->sql_getEntryByID($_REQUEST['fb_id']);
    if ((!$check) && ($feedbacks->error != fb_error_no_error)) {
      // SQL Fehler
      return $feedbacks->error;   }
    elseif ((!$check) && ($feedbacks->error == fb_error_no_error)) {
      // Datensatz existiert nicht!
      return sprintf(fb_error_record_not_exists, $_REQUEST['fb_id']);  }
    $parser = new templateParser();
    $parser->add('intro', fb_backend_edit_intro);
    $parser->add('action', ADMIN_URL. '/pages/modify.php?page_id='.$this->page_id.'&fb_action=save_edit&fb_id='.$_REQUEST['fb_id']);
    $parser->add('id', sprintf('%05d', $feedbacks->record['id']));
    $parser->add('mailto', $feedbacks->record['email']);
    $parser->add('page_id', $this->page_id);
    $parser->add('sender', stripslashes($feedbacks->record['name']));
    $parser->add('date', date(fb_feedback_datetime, $feedbacks->record['timestamp']));
    $parser->add('header', stripslashes($feedbacks->record['header']));
    $parser->add('text', stripslashes($feedbacks->record['feedback']));
    $parser->add('comment_header', fb_backend_comment_header);
    $parser->add('comment', stripslashes($feedbacks->record['comment']));
    $parser->add('btn_submit', fb_btn_save);
    $parser->add('btn_abort', fb_btn_abort);
    $parser->add('abort_location', ADMIN_URL. '/pages/modify.php?page_id='.$this->page_id);
    $parser->parseTemplateFile(templatePath. 'backend.feedback.edit.htt');
    return $parser->getHTML();
  }

  /**
   * Kommentar zu einem Feedback sichern
   *
   * @return STR
   */
  function saveComment() {
    global $admin;
    $feedbacks = new sql_feedback();
    // alten Datensatz holen
    $check = $feedbacks->sql_getEntryByID($_REQUEST['fb_id']);
    if ((!$check) && ($feedbacks->error != fb_error_no_error)) {
      // SQL Fehler
      return $feedbacks->error;   }
    elseif ((!$check) && ($feedbacks->error == fb_error_no_error)) {
      // Datensatz existiert nicht!
      return sprintf(fb_error_record_not_exists, $_REQUEST['fb_id']);  }
    // Neue Daten uebernehmen
    $feedbacks->record['comment'] = $_REQUEST['fb_comment'];
    if (!empty($feedbacks->record['comment'])) {
      $feedbacks->record['comment_from'] = $admin->get_display_name();
      $feedbacks->record['comment_mail'] = $admin->get_email();
      $feedbacks->record['comment_date'] = time();  }
    else {
      $feedbacks->record['comment_from'] = '';
      $feedbacks->record['comment_mail'] = '';
      $feedbacks->record['comment_date'] = '';  }
    if (!$feedbacks->sql_updateEntry($_REQUEST['fb_id'])) {
      return $feedbacks->error;  }
    else {
      return sprintf(fb_backend_success_update, $_REQUEST['fb_id']); }
  }

  /**
   * Ein Feedback kommentieren
   * Gibt einen Dialog als STR zurueck
   *
   * @return STR
   */
  function dlgComment() {
    // Datensatz auslesen
    $feedbacks = new sql_feedback();
    $check = $feedbacks->sql_getEntryByID($_REQUEST['fb_id']);
    if ((!$check) && ($feedbacks->error != fb_error_no_error)) {
      // SQL Fehler
      return $feedbacks->error;   }
    elseif ((!$check) && ($feedbacks->error == fb_error_no_error)) {
      // Datensatz existiert nicht!
      return sprintf(fb_error_record_not_exists, $_REQUEST['fb_id']);  }
    $parser = new templateParser();
    $parser->add('intro', fb_backend_comment_intro);
    $parser->add('action', ADMIN_URL. '/pages/modify.php?page_id='.$this->page_id.'&fb_action=save_comment&fb_id='.$_REQUEST['fb_id']);
    $parser->add('id', sprintf('%05d', $feedbacks->record['id']));
    $parser->add('page_id', $this->page_id);
    $parser->add('mailto', $feedbacks->record['email']);
    $parser->add('sender', stripslashes($feedbacks->record['name']));
    $parser->add('date', date(fb_feedback_datetime, $feedbacks->record['timestamp']));
    $parser->add('header', stripslashes($feedbacks->record['header']));
    $parser->add('text', stripslashes($feedbacks->record['feedback']));
    $parser->add('comment_header', fb_backend_comment_header);
    $parser->add('comment', stripslashes($feedbacks->record['comment']));
    $parser->add('btn_submit', fb_btn_save);
    $parser->add('btn_abort', fb_btn_abort);
    $parser->add('abort_location', ADMIN_URL. '/pages/modify.php?page_id='.$this->page_id);
    $parser->parseTemplateFile(templatePath. 'backend.feedback.comment.htt');
    return $parser->getHTML();
  }

  function getHelpContent() {
    ob_start();
    if (file_exists(WB_PATH.'/modules/feedback/help/'.LANGUAGE.'/help.php')) {
      include(WB_PATH.'/modules/feedback/help/'.LANGUAGE.'/help.php');  }
    else {
      include(WB_PATH.'/modules/feedback/help/EN/help.php');  }
    $result = ob_get_contents();
    ob_end_clean();
    return $result;
  }

  /**
   * STANDARD DIALOG fuer das Backend
   *
   */
  function showDialog($showHelp=false) {
    $parser = new templateParser();
    $parser->add('header', fb_backend_header);
    $parser->add('form_action', ADMIN_URL. '/pages/modify.php?page_id='.$this->page_id);
    $parser->add('page_id', $this->page_id);
    $parser->add('section_id', $this->section_id);
    if ($showHelp) {
      // Hilfe anzeigen
      $parser->add('help', $this->getHelpContent());
      // Intro stoert in diesem Fall
      $parser->add('intro', ''); }
    else {
      // keine Hilfe anzeigen aber den Schalter
      $parser->add('help', sprintf('<div class="fb_help_btn">[<a href="%s">%s</a>]</div>',ADMIN_URL. '/pages/modify.php?page_id='.$this->page_id.'&fb_action=help', fb_btn_help));
      if (empty($this->comment)) {
        $parser->add('intro', fb_backend_intro); }
      else {
        $parser->add('intro', $this->comment);  }}
    // Feedbacks anzeigen
    $parser->add('feedbacks', $this->getFeedbacks());
    // latest_first
    ($this->options['latest_first'] == 1) ? $checked = ' checked="checked"' : $checked = '';
    $parser->add('latest_first_checked', $checked);
    $parser->add('latest_first_text', fb_backend_latest_first);
    // publish_immediately
    ($this->options['publish_immediately'] == 1) ? $checked = ' checked="checked"' : $checked = '';
    $parser->add('publish_immediately_checked', $checked);
    $parser->add('publish_immediately_text', fb_backend_publish_immediately);
    // info_email
    $parser->add('info_email', $this->options['info_email']);
    $parser->add('info_email_text', fb_backend_info_email);
    $parser->add('btn_save', fb_btn_save);
    $parser->add('btn_abort', fb_btn_abort);
    $parser->add('abort_location', ADMIN_URL. '/pages/modify.php?page_id='.$this->page_id);
    $parser->add('btn_options', fb_btn_options);
    $parser->parseTemplateFile(templatePath. 'backend.htt');
    $parser->echoHTML();
  }

  /**
   * Feedbacks auslesen und formatiert als STR zurueckgeben
   *
   * @return STR
   */
  function getFeedbacks() {
    // INI-File auslesen
    $feedbacks = new sql_feedback();
    if ((!$feedbacks->sql_getEntries($this->page_id, $this->section_id)) && ($feedbacks->error != fb_error_no_error)) {
      return $feedbacks->error;  }
    if (sizeof($feedbacks->data) < 1) {
      return fb_backend_no_feedbacks;  }
    if ($this->options['latest_first']) {
      $feedbacks->data = $feedbacks->sortLatestFirst($feedbacks->data); }
    else {
      $feedbacks->data = $feedbacks->sortLatestLast($feedbacks->data); }
    $parser = new templateParser();
    $result = '';
    for ($i=0; $i < sizeof($feedbacks->data); $i++) {
      $parser->add('id', sprintf('%05d', $feedbacks->data[$i]['id']));
      $parser->add('mailto', $feedbacks->data[$i]['email']);
      $parser->add('sender', stripslashes($feedbacks->data[$i]['name']));
      $parser->add('date', date(fb_feedback_datetime, $feedbacks->data[$i]['timestamp']));
      $parser->add('header',stripslashes($feedbacks->data[$i]['header']));
      $parser->add('text', stripslashes($feedbacks->data[$i]['feedback']));
      if (!empty($feedbacks->data[$i]['comment'])) {
        $parser->add('comment', sprintf(fb_backend_comment, $feedbacks->data[$i]['comment_from'], date(fb_feedback_datetime, $feedbacks->data[$i]['comment_date']), stripslashes($feedbacks->data[$i]['comment']))); }
      else {
        $parser->add('comment', '');   }
      // Feedback muss noch FREIGESCHALTET werden!
      if ($feedbacks->data[$i]['active'] == 0) {
        $parser->add('activate', sprintf('[<a href="%s"><strong>%s</strong></a>]&nbsp;&nbsp;', ADMIN_URL. '/pages/modify.php?page_id='.$this->page_id.'&fb_action=activate&fb_id='.$feedbacks->data[$i]['id'], fb_btn_activate));
      }
      else {
        $parser->add('activate', '');  }
      $parser->add('link_delete', ADMIN_URL. '/pages/modify.php?page_id='.$this->page_id.'&fb_action=delete&fb_id='.$feedbacks->data[$i]['id']);
      $parser->add('btn_delete', fb_btn_delete);
      // EDITIEREN nur wenn in der feedback.ini erlaubt!
      if (fb_cfg_edit_feedbacks) {
        $parser->add('edit', sprintf('[<a href="%s">%s</a>]&nbsp;&nbsp;', ADMIN_URL. '/pages/modify.php?page_id='.$this->page_id.'&fb_action=edit&fb_id='.$feedbacks->data[$i]['id'], fb_btn_edit)); }
      else {
        $parser->add('edit', ''); }
      $parser->add('link_comment', ADMIN_URL. '/pages/modify.php?page_id='.$this->page_id.'&fb_action=comment&fb_id='.$feedbacks->data[$i]['id']);
      $parser->add('btn_comment', fb_btn_comment);
      //$parser->add('action', sprintf());
      $parser->parseTemplateFile(templatePath. 'backend.feedback.item.htt');

    }
    $result .= $parser->getHTML();
    return $result;
  }

  /**
   * Gibt eine Fehlermeldung aus
   *
   */
  function print_error() {
    $parser = new templateParser();
    $parser->add('header', fb_error_header);
    $parser->add('error', $this->error);
    $parser->parseTemplateFile(templatePath. 'backend.error.htt');
    $parser->echoHTML();
  }

  function getPageTitleByID($pageID) {
    global $database;
    $sqlQuery = "SELECT * FROM ".TABLE_PREFIX."pages WHERE page_id='".$pageID."'";
    @$sqlResult = $database->query($sqlQuery);
    if (!$database->is_error()) {
      $resArray = $sqlResult->fetchRow();
      $result = $resArray['page_title']; }
    else {
      // Fehler bei der Abfrage
      $result = false;  }
    return $result;
  }

  function getPageURLByID($pageID) {
    global $database;
    $sqlQuery = "SELECT * FROM ".TABLE_PREFIX."pages WHERE page_id='".$pageID."'";
    @$sqlResult = $database->query($sqlQuery);
    if (!$database->is_error()) {
      $resArray = $sqlResult->fetchRow();
      $result = WB_URL. PAGES_DIRECTORY. $resArray['link'] . PAGE_EXTENSION;
    }
    else {
      // Fehler bei der Abfrage
      $result = false;  }
    return $result;
  }

  function activateFeedback() {
    global $page_id;
    $feedback = new sql_feedback();
    if ($feedback->sql_getEntryByID($_REQUEST['fb_id'])) {
      // Datensatz aktualisieren
      $feedback->record['active'] = 1;
      $feedback->record['activation_stamp'] = time();
      if ($feedback->sql_updateEntry($_REQUEST['fb_id'])) {
        // Datensatz erfolgreich aktualisiert
        $pageTitle = $this->getPageTitleByID($page_id);
        $subject = sprintf(fb_mail_subject, $pageTitle);
        $link = $this->getPageURLByID($page_id);
        $to = '"'. stripslashes($feedback->record['name']).'" <'.$feedback->record['email'].'>';
        if (!empty($this->options['info_email'])) {
          $from = $this->options['info_email'];  }
        else {
          $from = SERVER_EMAIL;   }
        // E-Mail an den Ersteller des Feedback
        $message = sprintf(fb_mail_body_published, date(fb_feedback_datetime, $feedback->record['timestamp']), stripslashes($feedback->record['feedback']), $link);
        $headers =  'From: '. $from . "\r\n".
                    'Reply-To: '. $from . "\r\n".
                    'X-Mailer: PHP/' .phpversion();
        if (mail($to, $subject, $message, $headers)) {
          // Feedback freigeschaltet, E-Mail versendet
          $result = fb_feedback_published_ok;  }
        else {
          // Feedback freigeschaltet, KEINE E-Mail versendet
          $result = fb_feedback_published_no_mail;  }
      }
      else {
        // Fehler beim Aktualisieren des Datensatz
        $result = sprintf(fb_error_update_record, 'ID: '.$_REQUEST['fb_id'], $feedback->error);  }
    }
    else {
      // Fehler beim Lesen des Datensatz
      $result = sprintf(fb_error_record_not_exists, $_REQUEST['fb_id']);  }
    return $result;
  }

} // class feedback_modify_dlg


/**
 * Klasse FEEDBACK_VIEW_DLG fuer das FRONTEND
 *
 */
class feedback_view_dlg extends sql_feedback {

  var $page_id;
  var $section_id;
  var $options;
  var $remark;

  /**
   * Constructor
   *
   * @param INT $page_id
   * @param INT $section_id
   * @return feedback_view_dlg
   */
  public function __construct($page_id, $section_id) {
    parent::__construct(); // call construct of the parent class
    $this->remark = '';
    $this->page_id = $page_id;
    $this->section_id = $section_id;
    $this->record = array();
    $this->record['page_id'] = $page_id;
    $this->record['section_id'] = $section_id;
    $this->options = array();
    // Optionen auslesen...
    $options = new sql_feedback_options();
    if ($options->sql_getOptions($page_id, $section_id)) {
      $this->options = $options->record;  }
    elseif ($options->error != fb_error_no_error) {
      // SQL Fehler
      $this->error = $options->error;
      $this->print_error();  }
    else {
      // keine Daten...
    }
  }

  function xssPrevent(&$request) {
    $request = htmlspecialchars($request,ENT_QUOTES);
    $request = strip_tags($request);
    $request = trim($request);
    return $request;
  }

  /**
   * Ereignisverwaltung
   *
   */
  function action() {
    // to prevent XSS check each used $_REQUEST[]
    $this->xssPrevent($_REQUEST['fb_action']);
    $this->xssPrevent($_REQUEST['fb_email']);
    $this->xssPrevent($_REQUEST['fb_header']);
    $this->xssPrevent($_REQUEST['fb_text']);
    $this->xssPrevent($_REQUEST['captcha']);
    $this->xssPrevent($_REQUEST['fb_name']);
    $this->xssPrevent($_REQUEST['id']);
    $this->xssPrevent($_REQUEST['code']);
    isset($_REQUEST['fb_action']) ? $action = $_REQUEST['fb_action'] : $action = '';
    switch ($action):
    case 'activate':
    case 'delete':
      $this->activate_feedback();
      $this->show_feedbacks();
      break;
    case 'check':
      if (!$this->check_request()) {
        $this->dlg_feedback();  }
      else {
        $this->add_feedback();  }
      break;
    case 'feedback':
      // Dialog fuer Feedback anzeigen
      $this->dlg_feedback();
      break;
    case 'abort':
    default:
      $this->show_feedbacks();
      break;
    endswitch;
  }

  /**
   * Standard Dialog fuer das Frontend
   *
   */
  function show_feedbacks() {
    $sScriptUrl = WB_URL.str_replace(str_replace('\\', '/', realpath(WB_PATH)), '', str_replace('\\', '/', ($_SERVER['SCRIPT_FILENAME'])));
    $sActionUrl = $sScriptUrl;
    $parser = new templateParser();
    $parser->add('anchor',fb_anchor);
    $parser->add('remark', $this->remark);
    $parser->add('feedbacks', $this->get_feedbacks());
    $parser->add('intro', sprintf(fb_frontend_intro, WEBSITE_TITLE, $sActionUrl.'?fb_action=feedback'.'#'.fb_anchor));
    $parser->parseTemplateFile(templatePath. 'frontend.htt');
    $parser->echoHTML();
  }

  /**
   * Feedbacks auslesen und formatiert als STR zurueckgeben
   *
   * @return STR
   */
  function get_feedbacks() {
    $result = '';
    $parser = new templateParser();
    // Feedbacks auslesen
    if ($this->sql_getEntries($this->page_id, $this->section_id)) {
      // In welcher Reihenfolge ausgeben?
      if ($this->options['latest_first']) {
        $this->data = $this->sortLatestFirst($this->data); }
      else {
        $this->data = $this->sortLatestLast($this->data);  }
      for ($i=0; $i < sizeof($this->data); $i++) {
        if ($this->data[$i]['active'] == 1) {
          $parser->add('sender', sprintf(fb_feedback_item_sender, stripslashes($this->data[$i]['name']),
          date(fb_feedback_datetime, $this->data[$i]['timestamp'])));
          $parser->add('header', stripslashes($this->data[$i]['header']));
          $parser->add('text', stripslashes($this->data[$i]['feedback']));
          $parser->add('comment', $this->get_comment($this->data[$i]));
          $parser->parseTemplateFile(templatePath. 'frontend.feedback.item.htt');
          }
      }
      $result .= $parser->getHTML(true);
      return $result;
    }
    elseif ($this->error != fb_error_no_error) {
      // SQL Fehler
      $parser->add('error', $this->error);
      $parser->parseTemplateFile(templatePath. 'frontend.error.htt');
      return $parser->getHTML();  }
  }

  /**
   * Unterfunktion, liest Kommentare zu Feedbacks aus und gibt sie als STR zurueck
   *
   * @param ARRAY $data
   * @return STR
   */
  function get_comment($data) {
    if (!empty($data['comment'])) {
      // es existiert ein Kommentar
      $parser = new templateParser();
      $parser->add('header', sprintf(fb_frontend_comment_header, $data['comment_mail'], $data['comment_from'], date(fb_feedback_datetime, $data['comment_date'])));
      $parser->add('text', stripslashes($data['comment']));
      $parser->parseTemplateFile(templatePath. 'frontend.feedback.comment.htt');
      return $parser->getHTML();  }
    else {
      return '';  }
  }

  /**
   * Ueberprueft Werte, die mit dem Formular uebergeben wurden
   * Gibt FALSE bei Fehler zurueck und legt eine Meldung in
   * $this->error ab.
   *
   * @return BOOL
   */
  function check_request() {
    global $wb;
    $this->record['name'] = $_REQUEST['fb_name'];
    if ((empty($this->record['name'])) || (strlen($this->record['name']) < 3)) {
      // Name ist leer oder enthaelt weniger als 3 Zeichen
      $this->error = sprintf(fb_error_invalid_name, $this->record['name'], 3);
      return false;   }
    // E-Mail Adresse in Ordnung?
    $this->record['email'] = $_REQUEST['fb_email'];
    if (empty($this->record['email'])) {
      // enthaelt keinen Wert
      $this->error = fb_error_empty_email;
      return false; }
    if (!$wb->validate_email($this->record['email'])) {
      // E-Mail Adresse ist ungueltig
      $this->error = sprintf(fb_error_invalid_email, $this->record['email']);
      return false; }
    // Betreff prüfen...
    $this->record['header'] = $_REQUEST['fb_header'];
    if (empty($this->record['header'])) {
      // leeren Header durch Seitentitel ersetzen
      $this->record['header'] = PAGE_TITLE;
      $_REQUEST['fb_header'] = PAGE_TITLE;  }
    if (strlen($this->record['header']) < 3) {
      $this->error = sprintf(fb_error_invalid_header, $this->record['header'], 3);
      return false; }
    // eingegebenen Text ueberpruefen
    $this->record['feedback'] = addslashes($_REQUEST['fb_text']);
    if (strlen($this->record['feedback']) < 10) {
      $this->error = sprintf(fb_error_invalid_text, $this->record['feedback'], 10);
      return false;  }
    // Captcha pruefen
    if ((!$wb->is_authenticated()) && ($_REQUEST['captcha'] != $_SESSION['captcha'])) {
      $this->error = fb_error_invalid_captcha;
      return false;  }
    // Pruefen, ob Feedback sofort freigegeben werden kann
    $this->record['active'] = $this->options['publish_immediately'];
    if ($this->options['publish_immediately']) {
      $this->record['activation_code'] = '0'; }
    else {
      $code = rand(100000000, 999999999);
      $this->record['activation_code'] = $code; }
    $this->record['activation_stamp'] = time();
    return true;
  }

  /**
   * Ausgabe von Fehlermeldungen
   *
   */
  function print_error() {
    $parser = new templateParser();
    $parser->add('error', $this->error);
    $parser->parseTemplateFile(templatePath. 'frontend.error.htt');
    $parser->echoHTML();
  } // print_error

  function getWBVersion() {
    if(!defined('VERSION')) {
      // keine Fehlermeldung erwuenscht
      @include(ADMIN_PATH . '/interface/version.php');
      if (!defined('VERSION')) {
        $version = 2.6; }
      else {
        $version = floatval(VERSION); } }
    else {
      $version = floatval(VERSION); }
    return $version;
  }

  /**
   * Dialog fuer die Eingabe des Feedback
   *
   */
  function dlg_feedback() {
    global $wb;
    $parser = new templateParser();
    // Anker setzen
    $parser->add('anchor', fb_anchor);
    $parser->add('action', $_SERVER['PHP_SELF'].'#'.fb_anchor);
    // Naechste Aktion festlegen
    $parser->add('fb_action', 'check');
    // Liegt ein Fehler vor?
    $error ='';
    if ($this->error != fb_error_no_error) {
      $secondParser = new templateParser();
      $secondParser->add('error', $this->error);
      $secondParser->parseTemplateFile(templatePath. 'frontend.dialog.error.htt');
      $error = $secondParser->getHTML();  }
    $parser->add('error', $error);
    // Intro
    $parser->add('intro', fb_dialog_intro);
    /*
    // Der Name muss nur eingegeben werden, wenn der User nicht angemeldet ist
    $parser->add('title_name', fb_title_name);
    if (!isset($_REQUEST['fb_name'])) {
      $wb->is_authenticated() ? $name = $wb->get_display_name() : $name = ''; }
    else {
      $name = stripslashes($_REQUEST['fb_name']);  }
    $parser->add('name', $name);
    // Die E-Mail Adresse muss nur eingegeben werden, wenn der User nicht angemeldet ist
    $parser->add('title_email', fb_title_email);
    if (!isset($_REQUEST['fb_email'])) {
      $wb->is_authenticated() ? $email = $wb->get_email() : $email = ''; }
    else {
      $email = $_REQUEST['fb_email'];  }
    $parser->add('email', $email);
        */
    // Der Name muss nur eingegeben werden, wenn der User nicht angemeldet ist
    $parser->add('title_name', fb_title_name);
        $wb->is_authenticated() ? $name = $wb->get_display_name() : $name = '';
    if (isset($_REQUEST['fb_name']) && !empty($_REQUEST['fb_name'])) {
            $name = stripslashes($_REQUEST['fb_name']); }
        $parser->add('name', $name);
    // Die E-Mail Adresse muss nur eingegeben werden, wenn der User nicht angemeldet ist
    $parser->add('title_email', fb_title_email);
        $wb->is_authenticated() ? $email = $wb->get_email() : $email = '';
        if (isset($_REQUEST['fb_email']) && !empty($_REQUEST['fb_email'])) {
            $email = $_REQUEST['fb_email'];  }
        $parser->add('email', $email);

    // Als Vorgabe fuer den Betreff wird der Seitentitel eingesetzt
    $parser->add('title_header', fb_title_header);
    !isset($_REQUEST['fb_header']) ? $header = PAGE_TITLE : $header = stripslashes($_REQUEST['fb_header']);
    $parser->add('header', $header);
    // Kommentar
    $parser->add('title_text', fb_title_text);
    isset($_REQUEST['fb_text']) ? $text = stripslashes($_REQUEST['fb_text']) : $text = '';
    $parser->add('text', $text);
    // Captcha, wenn User nicht angemeldet ist
    $captcha = '';
    if (!$wb->is_authenticated()) {
      if ($this->getWBVersion() < 2.7) {
        $secondParser = new templateParser();
        // Sicherstellen, dass GD Library installiert ist
        if(extension_loaded('gd') AND function_exists('imageCreateFromJpeg')) {
          // Zufallszahlen generieren
          $_SESSION['captcha'] = '';
          for($i = 0; $i < 5; $i++) {
            $_SESSION['captcha'] .= rand(0,9); }
            $secondParser->add('captcha_url', WB_URL .'/modules/feedback/captcha26.php?t='.time());
            $secondParser->add('captcha_explain', fb_captcha_explain);
            $secondParser->parseTemplateFile(templatePath. 'frontend.dialog.captcha26.htt');
            $captcha = $secondParser->getHTML();  }}
      else {
        // WB 2.7.x
        $secondParser = new templateParser();
        if (class_exists('useCaptcha')) {
          $cap = new useCaptcha();
          $getCaptcha = $cap->getCaptcha();
          $explCaptcha = $cap->getCaptchaExplanation();
          $explCaptcha = "";
          $secondParser->add('captcha_display', $getCaptcha);
          $secondParser->add('captcha_explain', $explCaptcha);
          $secondParser->parseTemplateFile(templatePath. 'frontend.dialog.captcha27.htt');
          $captcha = $secondParser->getHTML();
        }
        elseif (function_exists('display_captcha_real')) {
            echo "treffer";
        }
      }
    }
    $parser->add('captcha', $captcha);
    // Abbruch
    $parser->add('btn_abort', fb_btn_abort);
    $parser->add('abort_location', $_SERVER['PHP_SELF'].'?fb_action=abort#'.fb_anchor);
    // Submit
    $parser->add('btn_submit', fb_btn_submit);
    $parser->parseTemplateFile(templatePath. 'frontend.dialog.htt');
    $parser->echoHTML();
  } // dlg_feedback


  /**
   * Handling fuer das Einfuegen eines Feedback in die Datenbank
   *
   */
  function add_feedback() {
    if (!$this->sql_isBodyDouble()) {
      // Eintrag existiert noch nicht
      if ($this->sql_addEntry()) {
        $parser = new templateParser();
        if ($this->options['publish_immediately'] == 1) {
          $parser->add('remark', fb_feedback_added); }
        else {
          $parser->add('remark', fb_feedback_not_published_immediately); }
        $parser->parseTemplateFile(templatePath. 'frontend.remark.htt');
        $this->remark = $parser->getHTML();
        $this->show_feedbacks();
        $this->promptMail(); }
      else {
        // SQL Fehler
        $this->print_error(); } }
    else {
      // Doublette, Eintrag existiert bereits!!!
      $parser = new templateParser();
      $parser->add('remark', $this->error);
      $parser->parseTemplateFile(templatePath. 'frontend.remark.htt');
      $this->remark = $parser->getHTML();
      $this->show_feedbacks(); }
  }

  function getPageURLByID($pageID) {
    global $database;
    $sqlQuery = "SELECT * FROM ".TABLE_PREFIX."pages WHERE page_id='".$pageID."'";
    @$sqlResult = $database->query($sqlQuery);
    if (!$database->is_error()) {
      $resArray = $sqlResult->fetchRow();
      $result = WB_URL. PAGES_DIRECTORY. $resArray['link'] . PAGE_EXTENSION;
    }
    else {
      // Fehler bei der Abfrage
      $result = false;  }
    return $result;
  }

  /**
   * Versendet eine Infomail bei einem neuen Feedback
   *
   * @return BOOL
   */
  function promptMail() {
    global $wb;
    global $page_id;
    if (!empty($this->options['info_email'])) {
      // Benachrichtigung per E-Mail versenden
      $to = $this->options['info_email'];
      $subject = sprintf(fb_mail_subject, PAGE_TITLE);
      if ($this->options['publish_immediately'] == 1) {
        $message = sprintf(fb_mail_body, PAGE_TITLE, stripslashes($this->record['name']), date(fb_feedback_datetime, $this->record['timestamp']),stripslashes($this->record['feedback'])); }
      else{
        $link = $this->getPageURLByID($this->page_id);
        $link .= '?fb_action=activate&id='. $this->record['id'].'&code='.$this->record['activation_code'];
        $link2 = $this->getPageURLByID($this->page_id);
        $link2 .= '?fb_action=delete&id='. $this->record['id'].'&code='.$this->record['activation_code'];
        $message = sprintf(fb_mail_body_activate, PAGE_TITLE, stripslashes($this->record['name']), date(fb_feedback_datetime, $this->record['timestamp']),stripslashes($this->record['feedback']), $link."\r\n\r\n".(html_entity_decode(fb_btn_delete, ENT_NOQUOTES, "ISO-8859-1")).": ".$link2);
      }

      $headers = 'From: "'.stripslashes($this->record['name']).'" <'.$this->record['email'].'>' . "\r\n" .
                 'Reply-To: '.$this->record['email']. "\r\n" .
                 'X-Mailer: PHP/' . phpversion();
      if (mail($to, $subject, $message, $headers)) {
        return true;  }
      else {
        return false;  }
    }
    else {
      return true;   }
  }

  function activate_feedback() {
    global $page_id;
    if ($this->sql_getEntryByID($_REQUEST['id'])) {
      if ($this->record['activation_code'] == $_REQUEST['code'] && $_REQUEST['fb_action'] == 'activate') {
        // ok - Code stimmt überein
        if ($this->record['active'] == 0) {
          // ok - Feedback freischalten
          $this->record['active'] = 1;
          $this->record['activation_stamp'] = time();
          if (!$this->sql_updateEntry($_REQUEST['id'])) {
            // Fehler bei der Aktualisierung der Datenbank
            $result = sprintf(fb_error_update_record, 'ID: '.$_REQUEST['id'], $this->error);  }
          else {
            // Datenbank aktualisiert
            $subject = sprintf(fb_mail_subject, PAGE_TITLE);
            $link = $this->getPageURLByID($this->page_id);
            $to = '"'. stripslashes($this->record['name']).'" <'.$this->record['email'].'>';
            if (!empty($this->options['info_email'])) {
              $from = $this->options['info_email'];  }
            else {
              $from = SERVER_EMAIL;   }
            // E-Mail an den Ersteller des Feedback
            $message = sprintf(fb_mail_body_published, date(fb_feedback_datetime, $this->record['timestamp']), stripslashes($this->record['feedback']), $link);
            $headers =  'From: '. $from . "\r\n".
                        'Reply-To: '. $from . "\r\n".
                        'X-Mailer: PHP/' .phpversion();
            if (mail($to, $subject, $message, $headers)) {
              // Feedback freigeschaltet, E-Mail versendet
              $result = fb_feedback_published_ok;  }
            else {
              // Feedback freigeschaltet, KEINE E-Mail versendet
              $result = fb_feedback_published_no_mail;  }
          }
        }
        else {
          // Feedback ist bereits freigeschaltet
          $result = sprintf(fb_error_already_published, $this->record['id'], date(fb_feedback_datetime, $this->record['activation_stamp']));
        }
      }
      elseif ($this->record['activation_code'] == $_REQUEST['code'] && $_REQUEST['fb_action'] == 'delete') {
                $this->sql_deleteEntryByID($_REQUEST['id']);
                $result = sprintf(fb_backend_success_delete, $_REQUEST['id']);
      }
      else {
        $result = fb_error_invalid_code_for_publish;
      }
    }
    else {
      // Datensatz ist nicht vorhanden
      $result = sprintf(fb_error_invalid_id_for_publish, $_REQUEST['id']);   }
    // $result ausgeben
    $parser = new templateParser();
    $parser->add('remark', $result);
    $parser->parseTemplateFile(templatePath. 'frontend.remark.htt');
    $this->remark = $parser->getHTML();
  }

} // class feedback_view_dlg



?>