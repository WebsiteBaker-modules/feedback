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

define('fb_not_implemented',									'<p><strong>Deze functie is nog niet beschikbaar.</strong></p>');

define('fb_error_add_record',						      '<p>Er is een fout opgetreden bij het toevoegen</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_add_search_feature',         '<p>Er is een fout opgetreden tijdens het toevoegen van de feedbackmodule aan de zoektabel</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_already_published',					'Het commentaar met ID <strong>%u</strong> was al vrijgegeven en vrijgegeven op %s.');
define('fb_error_create_table',               '<p>Er is een fout opgetreden tijdens het maken van een nieuwe tabel</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_delete_file',								'<p>Fout tijdens verwijderen van file <strong>%s</strong>');
define('fb_error_delete_record',							'<p>Er is een fout opgetreden bij het verwijderen van het record</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_delete_table',               '<p>Er is een fout opgetreden bij het verwijderen van de tabel</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_double_body',								'Dit record bestaat al in de tabel en wordt niet toegevoegd (reload protection).');
define('fb_error_empty_email',								'Type alsjeblieft je emailadres in!');
define('fb_error_get_defaults',               'Fout tijdens het lezen van de standaardwaarden: <strong>%s</strong>');
define('fb_error_header',                     'Fout in de feedbackmodule');
define('fb_error_invalid_captcha',						'De ingevulde nummers komen niet overeen met de nummers in de afbeelding!');
define('fb_error_invalid_code_for_publish',		'De ingevulde waarde komt niet overeen, het commentaar wordt niet toegevoegd!');
define('fb_error_invalid_email',							'Het email adres <strong>%s</strong> is ongeldig, type een geldig emailadres in!');
define('fb_error_invalid_header',							'Het onderwerp <strong>%s</strong> is te kort, moet op zijn minst %u tekens bevatten!');
define('fb_error_invalid_id_for_publish',			'Het commentaar met ID <strong>%s</strong> bestaat niet en kan niet worden gepubliceerd!');
define('fb_error_invalid_name',								'De naam <strong>%s</strong> bevat minder dan %u tekens en is niet geldig!');
define('fb_error_invalid_text',								'Je commentaar <strong>%s</strong> is te kort, het zou minimaal %u tekens moeten hebben!');
define('fb_error_no_error',                   'Geen fouten');
define('fb_error_not_specified',              'niet gespecificeerd');
define('fb_error_reading_records',						'<p>Er is een fout opgetreden bij het lezen van een record</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_remove_search_feature',      '<p>Er is een fout opgetreden bij het verwijderen van de zoekopdracht</p><p>[%s] <strong>%s</strong>');
define('fb_error_record_not_exists',					'Het record [<strong>%05d</strong>] bestaat niet!');
define('fb_error_update_record',							'<p>Er is een fout opgetreden tijdens het updaten van een record</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_upgrade',                    '<p>Er is een fout opgetreden tijdens het upgraden van de feedback module:</p><p>[%s] <strong>%s</strong></p>');

define('fb_backend_comment',									'<strong>%s</strong> schreef op %s:<br>%s');
define('fb_backend_comment_header',						'Commentaar van de editoral staff');
define('fb_backend_comment_intro',						'<strong>Met dit dialoogvenster kun je commentaar en userfeedbacks aan deze pagina toevoegen.</strong>');
define('fb_backend_edit_intro',								'<p><strong>Met dit dialoogvenster kun je commentaar van gebruikers bewerken.</strong></p><p>Hou in de gaten dat je handeld als een corrector als je commentaar van gebruikers wijzigd!!!</p>');
define('fb_backend_header',                   'Feedback-Module');
define('fb_backend_info_email',								'Stuur email bij nieuw commentaar');
define('fb_backend_intro',										'<p>Lees andere commentaren op deze pagina of verander opties.</p>');
define('fb_backend_latest_first',							'Laat het commentaar in aflopende volgorde zien');
define('fb_backend_no_feedbacks',							'<p>Geen commentaren beschikbaar voor deze pagina</p>');
define('fb_backend_options_updated',					'Opties voor de feedback module als ze zijn geüpdated.');
define('fb_backend_publish_immediately',			'Nieuwe commentaren worden onmiddelijk gepubliceerd.');
define('fb_backend_success_delete',						'Het commentaar [<strong>%05d</strong>] is verwijderd uit de tabel.');
define('fb_backend_success_update',						'Het commentaar [<strong>%05d</strong>] is geüpdate.');
define('fb_backend_success_upgrade',          'Upgrade van de feedback module was succesvol.');

define('fb_frontend_comment_header',					'<a href="mailto:%s">%s</a> schreef op %s:');
define('fb_frontend_header',									'Wij willen graag jouw mening horen.');
define('fb_frontend_intro',										'Vertel ons en alle bezoekers van <strong>%s</strong> <a href="%s">je mening over dit artikel</a>.');

define('fb_captcha_explain',									'Spamprotectie: Vul de tekens van het captcha plaatje in:');
define('fb_dialog_intro',											'Alle velden moeten worden ingevuld.<br />Je emailadres <strong>wordt niet gepubliceerd</strong>, het wordt alleen gebruikt door de sitebeheerder in het geval dat hij contact met je wil zoeken.<br /><strong>HTML</strong> formaat is niet mogelijk.');

define('fb_feedback_added',										'Bedankt voor je feedback!');
define('fb_feedback_datetime',								'd-m-Y \o\m H:i'); 
define('fb_feedback_item_sender',							'<strong>%s</strong> schreef op %s:');
define('fb_feedback_not_published_immediately','Bedankt voor je feedback, na controle door de site beheerder wordt je feedback gepubliceerd. We laten je via de email weten als het bericht is gepubliceerd.');
define('fb_feedback_published_ok',						'De feedback is vrijgegeven en de auteur ontvangt een email over de publicatie.');
define('fb_feedback_published_no_mail',				'De feedback is vrijgegeven. Systeem kan geen email verzenden aan de auteur over de publicatie.');

define('fb_mail_subject',											'[Feedback] %s');
define('fb_mail_body',												"De pagina %s\r\n\nheeft feedback ongvangen van %s op %s\r\n\nmet de volgende inhoud:\r\n\n%s\r\n\n******************************************************\r\nAUTOMATISCH BERICHT VIA DE FEEDBACK MODULE\r\n******************************************************");
define('fb_mail_body_activate',								"De pagina %s\r\n\nheeft feedback gehad %s op %s\r\n\nmet de volgende inhoud:\r\n\n%s\r\n\nDe feedback is nog niet gepubliceerd, je kunt het publiceren via de volgende link:\r\n\n--> %s\r\n\n******************************************************\r\nAUTOMATISCH BERICHT VIA DE FEEDBACK MODULE\r\n******************************************************");
define('fb_mail_body_published',							"Je commentaar van %s met de volgende inhoud:\r\n\n%s\r\n\nis goedgekeurd en gepubliceerd op de volgende website:\r\n\n--> %s\r\n\nBedankt voor je bijdrage!\r\n\n******************************************************\r\nAUTOMATISCH BERICHT VIA DE FEEDBACK MODULE\r\n******************************************************");

define('fb_title_email',											'Je emailadres:');
define('fb_title_header',											'Titel van je bericht:');
define('fb_title_name',												'Je naam:');
define('fb_title_text',												'Je bericht:');

define('fb_btn_abort',												'Afbreken');
define('fb_btn_activate',											'Verstuur');
define('fb_btn_captcha_reload',								'Verander plaatje...');
define('fb_btn_comment',											'Bericht');
define('fb_btn_delete',												'Verwijderen');
define('fb_btn_edit',													'Bewerken');
define('fb_btn_help',													'Help');
define('fb_btn_options',                      'Verander opties...');
define('fb_btn_save',													'Bewaar');
define('fb_btn_submit',												'Verzend');

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