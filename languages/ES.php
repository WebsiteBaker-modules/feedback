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
/** Traducción al español: Galynet 
**/
// Modulbeschreibung f&uuml;r Backend (WB 2.7)
//$module_description                           = "Erlaubt Besuchern das kommentieren von Seiten, direkt vom Frontend aus.";

define('fb_not_implemented',									'<p><strong>Funci&oacute;n no implementada.</strong></p>');

define('fb_error_add_record',						      '<p>Ha ocurrido un error al a&ntilde;adir el registro</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_add_search_feature',         '<p>Ha ocurrido un error al a&ntilde;adir el m&oacute;dulo feedback a la tabla de b&uacute;squeda </p><p>[%s] <strong>%s</strong></p>');
define('fb_error_already_published',					'El comentario con el ID <strong>%u</strong> ya fue desbloqueado y publicado el %s.');
define('fb_error_create_table',               '<p>Ha ocurrido un error durante la creaci&oacute;n de la nueva tabla</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_delete_file',								'<p>Error borrando archivo <strong>%s</strong>');
define('fb_error_delete_record',							'<p>Se ha producido un error durante el borrado del registro</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_delete_table',               '<p>Se ha producido un error durante el borrado de la tabla</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_double_body',								'Este registro ya existe en la tabla y no puede ser a&ntilde;adido de nuevo (protecci&oacute;n contra sobreescritura).');
define('fb_error_empty_email',								'Por favor, introduzca su direcci&oacute;n email!');
define('fb_error_get_defaults',               'Error leyendo valores por defecto: <strong>%s</strong>');
define('fb_error_header',                     'Erroe en el M&oacute;dulo Feedback');
define('fb_error_invalid_captcha',						'Los caracteres introducidos no son iguales a los de control (imagen de letras cifradas), por favor, intente de nuevo!');
define('fb_error_invalid_code_for_publish',		'La suma de comprobaci&oacute;n no se corresponde, el comentario no puede ser publicado!');
define('fb_error_invalid_email',							'El email <strong>%s</strong> no es v&aacute;lido, por favor, introduzca una direcci&oacute;n mail v&aacute;lida!');
define('fb_error_invalid_header',							'El asunto <strong>%s</strong> es demasiado corto, debe contener al menos %u caracteres!');
define('fb_error_invalid_id_for_publish',			'El comentario con ID <strong>%s</strong> no existe y por tanto no puede ser publicado!');
define('fb_error_invalid_name',								'El nombre <strong>%s</strong> contiene al menos %u caracteres que no son v&aacute;lidos!');
define('fb_error_invalid_text',								'Su comentario <strong>%s</strong> es demasiado corto, deber&iacute;a haber %u caracteres m&iacute;nimo!');
define('fb_error_no_error',                   'No error');
define('fb_error_not_specified',              'no especificado');
define('fb_error_reading_records',						'<p>Se produce un error al leer el registro</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_remove_search_feature',      '<p>Se produce un error mientras se quita funci&oacute;n de b&uacute;squeda</p><p>[%s] <strong>%s</strong>');
define('fb_error_record_not_exists',					'El registro [<strong>%05d</strong>] no existe!');
define('fb_error_update_record',							'<p>Se produce un error actualizando un registro</p><p>[%s] <strong>%s</strong></p>');
define('fb_error_upgrade',                    '<p>Se produce un error actualizando el m&oacute;dulo de feedback:</p><p>[%s] <strong>%s</strong></p>');

define('fb_backend_comment',									'<strong>%s</strong> escrito el %s:<br>%s');
define('fb_backend_comment_header',						'Comentario del personal editorial');
define('fb_backend_comment_intro',						'<strong>Con este cuadro de di&aacute;logo el usuario puede comentar las reacciones a esta p&aacute;gina.</strong>');
define('fb_backend_edit_intro',								'<p><strong>Con este di&aacute;logo usted puede editar los comentarios de los usuarios.</strong></p><p>Tenga en cuenta que usted est&aacute; actuando como un censor si cambia los comentarios!!!</p>');
define('fb_backend_header',                   'M&oacute;dulo Feedback');
define('fb_backend_info_email',								'Enviar por mail nuevo comentario');
define('fb_backend_intro',										'<p>Para leer comentarios de feddback de usuarios a esta p&aacute;gina o cambiar las opciones.</p>');
define('fb_backend_latest_first',							'Mostrar comentarios en orden descendente');
define('fb_backend_no_feedbacks',							'<p>No hay comentarios</p>');
define('fb_backend_options_updated',					'Las opciones han sido actualizadas.');
define('fb_backend_publish_immediately',			'Opiniones nuevas se publicar&aacute;n inmediatamente.');
define('fb_backend_success_delete',						'El comentario [<strong>%05d</strong>] ha sido borrado de la tabla de feedback.');
define('fb_backend_success_update',						'El comentario [<strong>%05d</strong>] ha sido actualizado.');
define('fb_backend_success_upgrade',          'Actualizaci&oacute;n del m&oacute;dulo feedback con &eacute;xito.');

define('fb_frontend_comment_header',					'<a href="mailto:%s">%s</a> escrito el %s:');
define('fb_frontend_header',									'Nos gustaría conocer tu opini&oacute;n.');
define('fb_frontend_intro',										'Por favor, exp&oacute;nganos  <strong>%s</strong> <a href="%s">su opini&oacute;n</a>.');

define('fb_captcha_explain',									'Protecci&oacute;n Spam: Por favor, introduzca los caracteres de la imagen:');
define('fb_dialog_intro',											'Todos los campos son obligatorios.<br />Su direcci&oacute;n email <strong>no ser&aacute; publicada</strong>, ser&aacute; utilizada &uacute;nicamente por el personal editor para contactar con usted.<br />No se permite formato <strong>HTML</strong> .');

define('fb_feedback_added',										'Gracias por su comentario!');
define('fb_feedback_datetime',								'j F, Y - h:i A');
define('fb_feedback_item_sender',							'<strong>%s</strong> escrito el %s:');
define('fb_feedback_not_published_immediately','Gracias por su comentario, tras ser comprobado por el personal editor su comentario ser&aacute; publicado. Le informaremos por e-mail de su publicaci&oacute;n.');
define('fb_feedback_published_ok',						'El comentario será desbloqueado y el autor recibir&aacute; un e-mail pinformativo acerca de la publicaci&oacute;n');
define('fb_feedback_published_no_mail',				'El comentario fue desbloqueado, pero el sistema no puede enviar un e-mail al autor para informarle acerca de la publicaci&oacute;n.');

define('fb_mail_subject',											'[Feedback] %s');
define('fb_mail_body',												"La p&aacute;gina %s\r\n\nfue comentada por %s at %s\r\n\ncon el siguiente comentario:\r\n\n%s\r\n\n******************************************************\r\nMENSAJE AUTOMATICO DEL MODULO FEEDBACK\r\n******************************************************");
define('fb_mail_body_activate',								"La p&aacute;gina %s\r\n\nfue comentada por %s at %s\r\n\ncon el siguiente comentario:\r\n\n%s\r\n\nEl comentario no ha sido activado a&uacute;n, debe activarlo siguiendo este link:\r\n\n--> %s\r\n\n******************************************************\r\nMENSAJE AUTOMATICO DEL MODULO FEEDBACK\r\n******************************************************");
define('fb_mail_body_published',							"Su comentario de %s con el contenido:\r\n\n%s\r\n\nha sido desbloqueado por el personal editor y publicado en el sitio web:\r\n\n--> %s\r\n\nGracias por su colaboraci&oacute;n!\r\n\n******************************************************\r\nMENSAJE AUTOMATICO DEL MODULO FEEDBACK\r\n******************************************************");

define('fb_title_email',											'Su email:');
define('fb_title_header',											'El motivo de su comentario:');
define('fb_title_name',												'Su nombre:');
define('fb_title_text',												'Su comentario:');

define('fb_btn_abort',												'Cancelar');
define('fb_btn_activate',											'Activar');
define('fb_btn_captcha_reload',								'Cambiar gr&aacute;fico...');
define('fb_btn_comment',											'Comentario');
define('fb_btn_delete',												'Borrar');
define('fb_btn_edit',													'Editar');
define('fb_btn_help',													'Ayuda');
define('fb_btn_options',                      'Cambiar opciones...');
define('fb_btn_save',													'Guardar');
define('fb_btn_submit',												'Enviar');

/**
 * Some Constants for Feedback Modul, DON'T TRANSLATE !!!
**/
// Anchor
define('fb_anchor',														'fb_anchor');
// Template Path
define('templatePath',                        WB_PATH.'/modules/feedback/htt/');
/**
 * Las siguientes constantes se utilizan como VALORES POR DEFECTO en nuevas secciones
 */
// Mostrar comentarios más recientes primero 1=true 0=false
define('fb_cfg_latest_first',                 1);
// Enviar E-Mail a esta dirección si tenemos nuevo comentario
define('fb_cfg_info_email',                   '');
// Permitir la edición de Opiniones en Backend 1=true 0=false
define('fb_cfg_edit_feedbacks',               1);
// Publicar nuevos comentarios inmediatamente 1=true 0=false
define('fb_cfg_publish_immediately',					1);

?>