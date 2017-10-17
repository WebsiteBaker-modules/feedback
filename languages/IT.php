<?php

/**
  Module developed for the Open Source Content Management System Website Baker (http://websitebaker.org)
  Copyright (c) 2008, Ralf Hertsch
  Contact me: hertsch(at)berlin.de, http://ralf-hertsch.de

  Italian translation by Alberto Donzelli - www.pizzaeimpasti.it 

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

define('fb_not_implemented',									'<p><strong>Questa funzione non &egrave; ancora stata implementata.</strong></p>');

define('fb_error_add_record',						      '<p>Errore durante l\'inserimento di un record</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_add_search_feature',         '<p>Errore durante l\'inserimento del modulo Feedback alla tabella di ricerca</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_already_published',					'Il commento con ID <strong>%u</strong> &egrave; gi&agrave; stato sbloccato e pubblicato il %s.');
define('fb_error_create_table',               '<p>Errore durante la creazione di una nuova tabella</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_delete_file',								'<p>Errore durante la cancellazione del file <strong>%s</strong>');
define('fb_error_delete_record',							'<p>Errore durante la cancellazione di un record</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_delete_table',               '<p>Errore durante la cancellazione di una tabella</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_double_body',								'Questo record esiste gi&agrave; nella tabella e non sar&agrave; aggiunto (protezione dal reload).');
define('fb_error_empty_email',								'Inserire l\'indirizzo e-mail!');
define('fb_error_get_defaults',               'Errore durante la lettura dei valori predefiniti: <strong>%s</strong>');
define('fb_error_header',                     'Errore nel modulo Feedback');
define('fb_error_invalid_captcha',						'Il checksum non &egrave; identico all\'immagine captcha, riprovare!');
define('fb_error_invalid_code_for_publish',		'Il checksum non corrisponde, il commento non pu&ograve; essere pubblicato!');
define('fb_error_invalid_email',							'L\'indirizzo e-mail <strong>%s</strong> non &egrave; valido, inserire un indirizzo email valido!');
define('fb_error_invalid_header',							'L\'oggetto <strong>%s</strong> &egrave; troppo breve, deve contenere almeno %u caratteri!');
define('fb_error_invalid_id_for_publish',			'Il commento con l\'ID <strong>%s</strong> non esiste e non pu� essere pubblicato!');
define('fb_error_invalid_name',								'Il nome <strong>%s</strong> contiene meno di %u caratteri e non &egrave; valido!');
define('fb_error_invalid_text',								'Il commento <strong>%s</strong> &egrave; troppo breve, deve avere almeno %u caratteri!');
define('fb_error_no_error',                   'Nessun errore');
define('fb_error_not_specified',              'non specificato');
define('fb_error_reading_records',						'<p>Errore durante la lettura del record </p><p>[%s] <strong>%s</strong></p>');
define('fb_error_remove_search_feature',      '<p>Errore durante la rimozione della ricerca</p><p>[%s] <strong>%s</strong>');
define('fb_error_record_not_exists',					'Il record [<strong>%05d</strong>] non esiste!');
define('fb_error_update_record',							'<p>Errore durante l\'aggiornamento di un record</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_upgrade',                    '<p>Errore durante l\'aggiornamento del modulo Feedback:</p><p>[%s] <strong>%s</strong></p>');

define('fb_backend_comment',									'<strong>%s</strong> scritto il %s:<br>%s');
define('fb_backend_comment_header',						'Commento dello staff editoriale');
define('fb_backend_comment_intro',						'<strong>Con questa dialog puoi commentare il feedback degli utenti a questa pagina.</strong>');
define('fb_backend_edit_intro',								'<p><strong>Con questa dialog puoi modificare i commenti degli utenti.</strong></p><p>Attenzione: ogni modifica di un commento &egrave; un\'azione di censura!!!</p>');
define('fb_backend_header',                   'Modulo Feedback');
define('fb_backend_info_email',								'Invia email quando c\'&egrave; un nuovo commento');
define('fb_backend_intro',										'<p>Leggi gli altri commenti di feedback a questa pagina o cambia le opzioni.</p>');
define('fb_backend_latest_first',							'Mostra i commenti in ordine discendente');
define('fb_backend_no_feedbacks',							'<p>nessun commento per questa pagina</p>');
define('fb_backend_options_updated',					'Le opzioni per il modulo Feedback sono state aggiornate.');
define('fb_backend_publish_immediately',			'I nuovi feedback saranno pubblicati immediatamente.');
define('fb_backend_success_delete',						'Il commento [<strong>%05d</strong>] &egrave; stato eliminato dalla tabella feedback.');
define('fb_backend_success_update',						'Il commento [<strong>%05d</strong>] &egrave; stato aggiornato.');
define('fb_backend_success_upgrade',          'Aggiornamento del modulo Feedback riuscito.');

define('fb_frontend_comment_header',					'<a href="mailto:%s">%s</a> ha scritto il %s:');
define('fb_frontend_header',									'Facci sapere la tua opinione.');
define('fb_frontend_intro',										'<a href="%s"><b>Commenta questo articolo!</b></a>'); 

define('fb_captcha_explain',									'Protezone ANTISPAM: scrivi i caratteri leggibili nell\'immagine captcha (rispettando maiuscole e minuscole):');
define('fb_dialog_intro',											'Tutti i campi devono essere compilati.<br />Il tuo indirizzo email <strong>NON SAR&Agrave; pubblicato</strong>, ma sar&agrave; utilizzato dalla staff editoriale per contattarti.<br />Il codice <strong>HTML</strong> non &egrave; consentito.');

define('fb_feedback_added',										'Grazie per il tuo commento!');
define('fb_feedback_datetime',								'j-n-Y, g:i ');
define('fb_feedback_item_sender',							'<strong>%s</strong> ha scritto il %s:');
define('fb_feedback_not_published_immediately','Grazie per il tuo commento, che sar&agrave; pubblicato dopo il controllo dello staff editoriale. Ti informeremo per email riguardo la pubblicazione.');
define('fb_feedback_published_ok',						'Il commento &egrave; stato sbloccato e l\'autore sar&agrave; informato per email riguardo la pubblicazione.');
define('fb_feedback_published_no_mail',				'Il commento &egrave; stato sbloccato. Il sistema non &egrave; in grado di spedire un messaggio email all\'autore per informarlo della pubblicazione.');

define('fb_mail_subject',											'[Feedback] %s');
define('fb_mail_body',												"La pagine %s\r\n\n&egrave; stata commentata da %s il %s\r\n\ncon il seguente feedback:\r\n\n%s\r\n\n******************************************************\r\nMESSAGGIO AUTOMATICO DAL MODULO FEEDBACK\r\n******************************************************");
define('fb_mail_body_activate',								"La pagina %s\r\n\n&egrave; stata commentata da %s il %s\r\n\ncon il seguente feedback:\r\n\n%s\r\n\nIl Feedback non &egrave; ancora stato pubblicato, puoi attivarlo cliccando sul seguente link:\r\n\n--> %s\r\n\n******************************************************\r\nMESSAGGIO AUTOMATICO DAL MODULO FEEDBACK\r\n******************************************************");
define('fb_mail_body_published',							"Il tuo feedback da %s con il contenuto:\r\n\n%s\r\n\n&egrave; stato sbloccato dallo staff editoriale ed &egrave; stato pubblicato nel sito:\r\n\n--> %s\r\n\nGrazie per il tuo interesse!\r\n\n******************************************************\r\nMESSGGIO AUTOMATICO DAL MODULO FEEDBACK\r\n******************************************************");

define('fb_title_email',											'Il tuo indirizzo email:');
define('fb_title_header',											'L\'oggetto del tuo commento:');
define('fb_title_name',												'Il tuo nome:');
define('fb_title_text',												'il tuo commento:');

define('fb_btn_abort',												'Abbandona');
define('fb_btn_activate',											'Attiva');
define('fb_btn_captcha_reload',								'Carica nuova immagine ANTISPAM (captcha)...');
define('fb_btn_comment',											'Commenta');
define('fb_btn_delete',												'Cancella');
define('fb_btn_edit',													'Modifica');
define('fb_btn_help',													'Aiuto');
define('fb_btn_options',                      'Cambia opzioni...');
define('fb_btn_save',													'Salva');
define('fb_btn_submit',												'Invia');

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
define('fb_cfg_publish_immediately',					0);

?>