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

define('fb_not_implemented',									'<p><strong>This function is not implemented yet.</strong></p>');

define('fb_error_add_record',						      '<p>An error occurs while adding a record</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_add_search_feature',         '<p>An error occurs while adding a the feedback-module to the searching table</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_already_published',					'The comment with ID <strong>%u</strong> was already unlocked and published at %s.');
define('fb_error_create_table',               '<p>An error occurs while creating a new table</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_delete_file',								'<p>Error deleting file <strong>%s</strong>');
define('fb_error_delete_record',							'<p>An error occurs while deleting a record</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_delete_table',               '<p>An error occurs while deleting a table</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_double_body',								'This record already exists in table an will not be added (reload protection).');
define('fb_error_empty_email',								'Please type in your e-mail address!');
define('fb_error_get_defaults',               'Error reading the default values: <strong>%s</strong>');
define('fb_error_header',                     'Error in Feedback-Module');
define('fb_error_invalid_captcha',						'The transmitted checksum is not identical with the captcha image, please try it again!');
define('fb_error_invalid_code_for_publish',		'The checksum does not correspond, the comment could not be published!');
define('fb_error_invalid_email',							'The email address <strong>%s</strong> is invalid, please type in a valid email address!');
define('fb_error_invalid_header',							'The subject <strong>%s</strong> is to short, should contain at least %u chars!');
define('fb_error_invalid_id_for_publish',			'The comment with ID <strong>%s</strong> does not exists and could not be published!');
define('fb_error_invalid_name',								'The name <strong>%s</strong> contains less than %u chars an is not valid!');
define('fb_error_invalid_text',								'Your comment <strong>%s</strong> is to short, it should have %u chars minimum!');
define('fb_error_no_error',                   'No error');
define('fb_error_not_specified',              'not specified');
define('fb_error_reading_records',						'<p>An error occurs while reading record</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_remove_search_feature',      '<p>An error occurs while removing search feature</p><p>[%s] <strong>%s</strong>');
define('fb_error_record_not_exists',					'The record [<strong>%05d</strong>] does not exist!');
define('fb_error_update_record',							'<p>An error occurs while updating a record</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_upgrade',                    '<p>An error occurs while upgrading the feedback-module:</p><p>[%s] <strong>%s</strong></p>');

define('fb_backend_comment',									'<strong>%s</strong> wrote at %s:<br>%s');
define('fb_backend_comment_header',						'Comment by editorial staff');
define('fb_backend_comment_intro',						'<strong>With this dialog you may comment user feedbacks to this page.</strong>');
define('fb_backend_edit_intro',								'<p><strong>With this dialog you may edit user comments.</strong></p><p>Please be aware that you are acting as a censor if you change user comments!!!</p>');
define('fb_backend_header',                   'Feedback-Module');
define('fb_backend_info_email',								'Send email by new comment');
define('fb_backend_intro',										'<p>Read oder comment user feedbacks to this page or change options.</p>');
define('fb_backend_latest_first',							'Show comments descending');
define('fb_backend_no_feedbacks',							'<p>no comments for this page</p>');
define('fb_backend_options_updated',					'Options for the feedback-module where updated.');
define('fb_backend_publish_immediately',			'New Feedbacks will be published immediately.');
define('fb_backend_success_delete',						'The comment [<strong>%05d</strong>] was deleted from the feedback table.');
define('fb_backend_success_update',						'The comment [<strong>%05d</strong>] was updated.');
define('fb_backend_success_upgrade',          'Upgrade of the feedback-module successful.');

define('fb_frontend_comment_header',					'<a href="mailto:%s">%s</a> wrote at %s:');
define('fb_frontend_header',									'We would like to hear your opinion.');
define('fb_frontend_intro',										'Please tell us and all visitors of <strong>%s</strong> <a href="%s">your opinion about this article</a>.');

define('fb_captcha_explain',									'Spamprotection: Please type in the charcters of the captcha image:');
define('fb_dialog_intro',											'All fields must be typed in.<br />Your email address will <strong>not be published</strong>, it will be only used by editorial staff to contact you.<br /><strong>HTML</strong> formatting is not possible.');

define('fb_feedback_added',										'Thank you for your comment!');
define('fb_feedback_datetime',								'F j, Y - h:i A');
define('fb_feedback_item_sender',							'<strong>%s</strong> wrote at %s:');
define('fb_feedback_not_published_immediately','Thank you for your comment, afer checking by editorial staff your comment will be published. We will inform you by E-Mail about the publishing.');
define('fb_feedback_published_ok',						'The comment was unlocked and the author get an E-Mail for information about publishing.');
define('fb_feedback_published_no_mail',				'The comment was unlocked. System can not send a E-Mail to the auther to inform him about the publishing.');

define('fb_mail_subject',											'[Feedback] %s');
define('fb_mail_body',												"The page %s\r\n\nwas commented by %s at %s\r\n\nwith the following feedback:\r\n\n%s\r\n\n******************************************************\r\nAUTOMATED MESSAGE BY THE FEEDBACK-MODULE\r\n******************************************************");
define('fb_mail_body_activate',								"The page %s\r\n\nwas commented by %s at %s\r\n\nwith the following feedback:\r\n\n%s\r\n\nThe Feedback is not published now, you my activate it by the following link:\r\n\n--> %s\r\n\n******************************************************\r\nAUTOMATED MESSAGE BY THE FEEDBACK-MODULE\r\n******************************************************");
define('fb_mail_body_published',							"Your Feedback from %s with the content:\r\n\n%s\r\n\nwas just unlocked by editorial staff and published at the website:\r\n\n--> %s\r\n\nThank you for your interesst!\r\n\n******************************************************\r\nAUTOMATED MESSAGE BY THE FEEDBACK-MODULE\r\n******************************************************");

define('fb_title_email',											'Your email address:');
define('fb_title_header',											'The subject of your comment:');
define('fb_title_name',												'Your name:');
define('fb_title_text',												'Your comment:');

define('fb_btn_abort',												'Abort');
define('fb_btn_activate',											'Activate');
define('fb_btn_captcha_reload',								'Change graphic...');
define('fb_btn_comment',											'Comment');
define('fb_btn_delete',												'Delete');
define('fb_btn_edit',													'Edit');
define('fb_btn_help',													'Help');
define('fb_btn_options',                      'Change options...');
define('fb_btn_save',													'Save');
define('fb_btn_submit',												'Submit');

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