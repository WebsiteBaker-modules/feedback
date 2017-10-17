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
//$module_description                           = "Erlaubt Besuchern das kommentieren von Seiten, direkt vom Frontend aus.";
//Norwegian translation by Torstein Steen (tost) Contact: torstein.steen(at)gmail.com

define('fb_not_implemented',									'<p><strong>Denne funksjonen er ikke i funksjon enda.</strong></p>');

define('fb_error_add_record',						      '<p>En feil skjedde ved lagring av innlegget.</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_add_search_feature',         '<p>En feil oppsto ved å legge til feedback-modulen til søks tabellen.</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_already_published',					'Kommentaren med ID <strong>%u</strong> er allerede ulåst og publisert på %s.');
define('fb_error_create_table',               '<p>En feil oppsto ved å lage en ny tabell</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_delete_file',								'<p>Feil ved sletting av fil <strong>%s</strong>');
define('fb_error_delete_record',							'<p>Feil ved sletting av innlegg</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_delete_table',               '<p>En feil oppsto ved sletting av tabell</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_double_body',								'Dette innlegget aksisterer allerede (reload protection).');
define('fb_error_empty_email',								'Fyll inn e-mail adresse!');
define('fb_error_get_defaults',               'Feil ved lesing av standardverdiene: <strong>%s</strong>');
define('fb_error_header',                     'Feil i Feedback-Modulen');
define('fb_error_invalid_captcha',						'Identifikasjonen stemmer ikke, vennligst prøv igjen!');
define('fb_error_invalid_code_for_publish',		'Identifikasjonen stemmer ikke, innlegget kan derfor ikke publiseres!');
define('fb_error_invalid_email',							'E-mailadressen <strong>%s</strong> er feil, vennligst skriv den inn på nytt!');
define('fb_error_invalid_header',							'Emne <strong>%s</strong> er for kort, må inneholde minst %u tegn!');
define('fb_error_invalid_id_for_publish',			'Kommentaren med ID <strong>%s</strong> eksisterer ikke og kan ikke publiseres!');
define('fb_error_invalid_name',								'Navnet <strong>%s</strong> inneholder mindre enn %u tegn, skriv navnet på nytt!');
define('fb_error_invalid_text',								'Din kommentar <strong>%s</strong> er for kort, det må minst ha %u tegn!');
define('fb_error_no_error',                   'Ingen feil');
define('fb_error_not_specified',              'ikke spesifisert');
define('fb_error_reading_records',						'<p>En feil oppsto ved lesing av innlegg</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_remove_search_feature',      '<p>En feil oppsto ved fjerning av søkefunksjon</p><p>[%s] <strong>%s</strong>');
define('fb_error_record_not_exists',					'Oppføringen [<strong>%05d</strong>] eksisterer ikke!');
define('fb_error_update_record',							'<p>En feil oppsto ved oppdatering av innlegget</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_upgrade',                    '<p>En feil oppsto ved oppgraderingen av feedback-modulen:</p><p>[%s] <strong>%s</strong></p>');

define('fb_backend_comment',									'<strong>%s</strong> skrevet %s:<br>%s');
define('fb_backend_comment_header',						'Kommentar fra administrator');
define('fb_backend_comment_intro',						'<strong>Her kan du kommentere brukerinnlegg.</strong>');
define('fb_backend_edit_intro',								'<p><strong>Her kan du editere brukerinnlegg.</strong></p><p>Vær oppmerksom på at du da opptrer som sensor av innlegg!!!</p>');
define('fb_backend_header',                   'Feedback-Module');
define('fb_backend_info_email',								'Send email ved nytt innlegg');
define('fb_backend_intro',										'<p>Les/slett eller kommenter innlegg.</p>');
define('fb_backend_latest_first',							'Vis innlegg synkende');
define('fb_backend_no_feedbacks',							'<p>ingen kommentarer på denne siden</p>');
define('fb_backend_options_updated',					'Valg for feedback-modulen når oppdatert.');
define('fb_backend_publish_immediately',			'Nye innlegg vil bli publisert umiddelbart.');
define('fb_backend_success_delete',						'Innlegget [<strong>%05d</strong>] ble slettet.');
define('fb_backend_success_update',						'Innlegget [<strong>%05d</strong>] ble oppdatert.');
define('fb_backend_success_upgrade',          'Oppgradering av feedback-modulen ble gjort suksessfullt.');

define('fb_frontend_comment_header',					'<a href="mailto:%s">%s</a> skrevet %s:');
define('fb_frontend_header',									'Vi vil gjerne høre dine kommentarer og meninger.');
define('fb_frontend_intro',										'Fortell leserne av %s <strong><a href="%s">dine meninger her.</strong></a>.');

define('fb_captcha_explain',									'Verifikasjon: Skriv inn bokstavene i bildet:');
define('fb_dialog_intro',											'Alle felt må fylles ut.<br />Din e-mailadresse <strong>vil ikke bli publisert.</strong><br /><strong>HTML</strong> koder er ikke mulig.');

define('fb_feedback_added',										'Takk for ditt innlegg!');
define('fb_feedback_datetime',								'j. F, Y - h:i A');
define('fb_feedback_item_sender',							'<strong>%s</strong> skrev den %s:');
define('fb_feedback_not_published_immediately','Takk for ditt innlegg, etter sjekk så blir det publisert. Du vil motta en mail når det er publisert.');
define('fb_feedback_published_ok',						'Dette innlegget blir nå publisert og den som har skrevet det får tilsendt en mail om at det er publisert.');
define('fb_feedback_published_no_mail',				'Dette innlegget blir nå publisert, men den som har skrevet det får ikke tilsendt en mail om at det er publisert fordi mailadresse mangler.');

define('fb_mail_subject',											'[Feedback] %s');
define('fb_mail_body',												"The page %s\r\n\nwas commented by %s at %s\r\n\nwith the following feedback:\r\n\n%s\r\n\n******************************************************\r\nAUTOMATED MESSAGE BY THE FEEDBACK-MODULE\r\n******************************************************");
define('fb_mail_body_activate',								"The page %s\r\n\nwas commented by %s at %s\r\n\nwith the following feedback:\r\n\n%s\r\n\nThe Feedback is not published now, you my activate it by the following link:\r\n\n--> %s\r\n\n******************************************************\r\nAUTOMATED MESSAGE BY THE FEEDBACK-MODULE\r\n******************************************************");
define('fb_mail_body_published',							"Your Feedback from %s with the content:\r\n\n%s\r\n\nwas just unlocked by editorial staff and published at the website:\r\n\n--> %s\r\n\nThank you for your interesst!\r\n\n******************************************************\r\nAUTOMATED MESSAGE BY THE FEEDBACK-MODULE\r\n******************************************************");

define('fb_title_email',											'Din e-mailadresse:');
define('fb_title_header',											'Emne:');
define('fb_title_name',												'Ditt navn:');
define('fb_title_text',												'Din kommentar:');

define('fb_btn_abort',												'Avbryt');
define('fb_btn_activate',											'Aktiver');
define('fb_btn_captcha_reload',								'Bytt grafikk...');
define('fb_btn_comment',											'Kommenter');
define('fb_btn_delete',												'Slett');
define('fb_btn_edit',													'Rediger');
define('fb_btn_help',													'Hjelp');
define('fb_btn_options',                      'Bytt...');
define('fb_btn_save',													'Lagre');
define('fb_btn_submit',												'Send');

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