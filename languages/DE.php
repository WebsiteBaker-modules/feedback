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

// Modulbeschreibung f&uuml;r Backend (WB 2.7)
$module_description                           = "Erlaubt Besuchern das kommentieren von Seiten, direkt vom Frontend aus.";

define('fb_not_implemented',									'<p><strong>Diese Funktion ist noch nicht implementiert.</strong></p>');

define('fb_error_add_record',						      '<p>Beim Hinzuf&uuml;gen eines Datensatz ist ein Fehler aufgetreten</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_add_search_feature',         '<p>Bei der Erg&auml;nzung der Suchtabelle f&uuml;r das Feedback-Modul ist ein Fehler aufgetreten</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_already_published',					'Der Kommentar mit der ID <strong>%u</strong> wurde bereits am %s freigeschaltet und ver&ouml;ffentlicht.');
define('fb_error_create_table',               '<p>Beim Anlegen einer Tabelle f&uuml;r das Feedback-Modul ist ein Fehler aufgetreten</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_delete_file',								'<p>Die Datei <strong>%s</strong> konnte nicht gel&ouml;scht werden!</p>');
define('fb_error_delete_record',							'<p>Beim Entfernen eines Datensatz ist ein Fehler aufgetreten</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_delete_table',               '<p>Beim L&ouml;schen einer Tabelle f&uuml;r das Feedback-Modul ist ein Fehler aufgetreten</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_double_body',								'Der Datensatz existiert bereits in der Datenbank und wird deshalb nicht noch einmal &uuml;bernommen (Reload?).');
define('fb_error_empty_email',								'Sie haben vergessen Ihre E-Mail Adresse anzugeben!');
define('fb_error_get_defaults',               'Fehler beim Auslesen der Standardwerte: <strong>%s</strong>');
define('fb_error_header',                     'Fehler im Feedback-Modul');
define('fb_error_invalid_captcha',						'Die eingegebene Pr&uuml;fsumme stimmt nicht mit der Abbildung &uuml;berein, bitte wiederholen Sie Ihre Eingabe!');
define('fb_error_invalid_code_for_publish',		'Der Pr&uuml;fcode stimmt nicht &uuml;berein, der Kommentar kann nicht ver&ouml;ffentlicht werden.');
define('fb_error_invalid_email',							'Die E-Mail Adresse <strong>%s</strong> ist ung&uuml;ltig, bitte geben Sie eine g&uuml;ltige E-Mail Adresse ein.');
define('fb_error_invalid_header',							'Der Betreff <strong>%s</strong> ist zu kurz, er sollte wenigstens %u Zeichen enthalten!');
define('fb_error_invalid_id_for_publish',			'Der Kommentar mit der ID <strong>%s</strong> existiert nicht und kann deshalb nicht ver&ouml;ffentlicht werden.');
define('fb_error_invalid_name',								'Der angegebene Name <strong>%s</strong> enth&auml;lt weniger als %u Zeichen und ist ung&uuml;ltig!');
define('fb_error_invalid_text',								'Ihr Kommentar <strong>%s</strong> ist zu kurz, er sollte wenigstens %u Zeichen enthalten!');
define('fb_error_no_error',                   'Kein Fehler');
define('fb_error_not_specified',              'Nicht spezifiziert');
define('fb_error_reading_records',						'<p>Beim Auslesen einer Tabelle f&uuml;r das Feedback-Modul ist ein Fehler aufgetreten</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_remove_search_feature',      '<p>Beim Entfernen der Suchfunktion aus der Suchtabelle ist ein Fehler aufgetreten.</p><p>[%s] <strong>%s</strong>');
define('fb_error_record_not_exists',					'Der Datensatz [<strong>%05d</strong>] existiert nicht!');
define('fb_error_update_record',							'<p>Beim Aktualisieren eines Datensatz ist ein Fehler aufgetreten</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_upgrade',                    '<p>W&auml;hrend des Upgrade des Feedback Modul ist ein Fehler aufgetreten.</p><p>[%s] <strong>%s</strong></p>');

define('fb_backend_comment',									'<strong>%s</strong> kommentierte am %s:<br>%s');
define('fb_backend_comment_header',						'Redaktioneller Kommentar');
define('fb_backend_comment_intro',						'<strong>Mit diesem Dialog k&ouml;nnen Sie Feedbacks zu dieser Seite kommentieren.</strong>');
define('fb_backend_edit_intro',								'<p><strong>Mit diesem Dialog k&ouml;nnen Sie Kommentare direkt bearbeiten.</strong></p><p>Seien Sie sich bitte bewu&szlig;t, da&szlig; Sie mit dieser Funktion eine Zensur aus&uuml;ben k&ouml;nnen.<br>Wenn Sie mit einem Beitrag nicht einverstanden sind, sollten Sie ihn kommentieren oder l&ouml;schen!</p>');
define('fb_backend_header',                   'Feedback-Modul');
define('fb_backend_info_email',								'Bei einem neuem Kommentar wird eine E-Mail an diese Adresse gesendet.');
define('fb_backend_intro',										'<p>Lesen und Kommentieren Sie Feedback Eintr&auml;ge zu dieser Seite oder &auml;ndern Sie Optionen des Feedback-Moduls.</p>');
define('fb_backend_latest_first',							'Kommentare in absteigender Reihenfolge anzeigen');
define('fb_backend_no_feedbacks',							'<p>Es liegen keine Kommentare zu dieser Seite vor.</p>');
define('fb_backend_options_updated',					'Die Optionen f&uuml;r das Feedback-Modul wurden aktualisiert.');
define('fb_backend_publish_immediately',			'Neue Feedbacks werden sofort ver&ouml;ffentlicht.');
define('fb_backend_success_delete',						'Der Eintrag [<strong>%05d</strong>] wurde aus der Feedback Liste gel&ouml;scht.');
define('fb_backend_success_update',						'Der Datensatz [<strong>%05d</strong>] wurde aktualisiert.');
define('fb_backend_success_upgrade',          'Das Upgrade f&uuml;r das Feedback-Modul wurde Fehlerfrei durchgef&uuml;hrt.');

define('fb_frontend_comment_header',					'<a href="mailto:%s">%s</a> kommentierte am %s:');
define('fb_frontend_header',									'Ihre Meinung interessiert uns!');
define('fb_frontend_intro',										'Bitte teilen Sie uns und allen Besuchern von <strong>%s</strong> <a href="%s">Ihre Meinung</a> mit.');

define('fb_captcha_explain',									'Zum Schutz vor unerw&uuml;nschten Beitr&auml;gen (Spamschutz) geben Sie bitte die Zeichen aus der Grafik in das Eingabefeld ein:');
define('fb_dialog_intro',											'Alle Felder sind Pflichtfelder.<br />Ihre E-Mail Adresse wird <strong>nicht</strong> ver&ouml;ffentlicht und vom Redaktionsteam ausschlie&szlig;lich f&uuml;r R&uuml;ckfragen verwendet.<br /><strong>HTML</strong> Formatierungen sind nicht m&ouml;glich.');

define('fb_feedback_added',										'Vielen Dank f&uuml;r Ihren Kommentar, er wurde der Datenbank zugef&uuml;gt!');
define('fb_feedback_datetime',								'd.m.Y \u\m H:i \U\h\r');
define('fb_feedback_item_sender',							'<strong>%s</strong> meinte am %s:');
define('fb_feedback_not_published_immediately','Vielen Dank f&uuml;r Ihren Kommentar, er wird unmittelbar nach Pr&uuml;fung durch einen Redakteur ver&ouml;ffentlicht.<br>Wir informieren Sie per E-Mail &uuml;ber die Ver&ouml;ffentlichung.');
define('fb_feedback_published_ok',						'Das Feedback wurde freigeschaltet und der Autor per E-Mail &uuml;ber die Ver&ouml;ffentlichung informiert.');
define('fb_feedback_published_no_mail',				'Das Feedback wurde freigeschaltet, es konnte jedoch keine E-Mail an den Autor gesendet werden, um ihn &uuml;ber die Ver&ouml;ffentlichung zu informieren!');

define('fb_mail_subject',											'[Feedback] %s');
define('fb_mail_body',												"Fuer die Seite %s\r\nwurde von %s am %s\r\n\ndas folgende Feedback eingetragen:\r\n\n%s\r\n\n******************************************************\r\nAUTOMATISCHE BENACHRICHTIGUNG DURCH DAS FEEDBACK-MODUL\r\n******************************************************");
define('fb_mail_body_activate',								"Fuer die Seite %s\r\nwurde von %s am %s\r\n\ndas folgende Feedback eingetragen:\r\n\n%s\r\n\nDas Feedback wurde noch nicht veroeffentlicht.\r\n\nSie koennen es mit dem folgenden Link freischalten:\r\n\n--> %s\r\n\n******************************************************\r\nAUTOMATISCHE BENACHRICHTIGUNG DURCH DAS FEEDBACK-MODUL\r\n******************************************************");
define('fb_mail_body_published',							"Ihr Feedback vom %s mit dem Inhalt:\r\n\n%s\r\n\nwurde gerade durch einen Redakteur freigegeben und auf der Website veroeffentlicht:\r\n\n--> %s\r\n\nVielen Dank fuer Ihr Interesse!\r\n\n******************************************************\r\nAUTOMATISCHE BENACHRICHTIGUNG DURCH DAS FEEDBACK-MODUL\r\n******************************************************");

define('fb_title_email',											'Ihre E-Mail Adresse:');
define('fb_title_header',											'Die &Uuml;berschrift zu Ihrer Stellungnahme:');
define('fb_title_name',												'Ihr Name:');
define('fb_title_text',												'Ihre Stellungnahme:');

define('fb_btn_abort',												'Abbruch');
define('fb_btn_activate',											'Aktivieren');
define('fb_btn_captcha_reload',								'Grafik wechseln...');
define('fb_btn_comment',											'Kommentieren');
define('fb_btn_delete',												'L&ouml;schen');
define('fb_btn_edit',													'Bearbeiten');
define('fb_btn_help',													'Hilfe');
define('fb_btn_options',                      'Einstellungen &auml;ndern...');
define('fb_btn_save',													'&Uuml;bernehmen');
define('fb_btn_submit',												'Abschicken');

/**
 * Some Constants for Feedback Modul, DON'T TRANSLATE !!!
**/
// Anchor
define('fb_anchor',														'fb_anchor');
// Template Path
define('templatePath',                        WB_PATH.'/modules/feedback/htt/');
/**
 * The following Constants will be used as DEFAULT VALUES at new sections
 */
// Show Last Feedback First 1=true 0=false
define('fb_cfg_latest_first',                 1);
// Send E-Mail to this address if getting a new Feedback
define('fb_cfg_info_email',                   '');
// Allow editing of Feedbacks in Backend 1=true 0=false
define('fb_cfg_edit_feedbacks',               1);
// Publish new feedbacks immediately 1=true 0=false
define('fb_cfg_publish_immediately',					1);

?>