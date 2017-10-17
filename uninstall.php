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

// prevent this file from being accesses directly
if(defined('WB_PATH') == false) {
	exit("Cannot access this file directly");
}

if(!file_exists(WB_PATH .'/modules/feedback/languages/' .LANGUAGE .'.php')) {
	require_once(WB_PATH .'/modules/feedback/languages/DE.php');
} else {
		require_once(WB_PATH .'/modules/feedback/languages/' .LANGUAGE .'.php');
}

require_once('class.feedback.php');

// Feedback
$feedback = new sql_feedback();

if (!$feedback->sql_deleteTable()) {
  $admin->print_error($feedback->error);
}

/**
 * Suchfunktionen entfernen
 */
if (!$feedback->sql_removeSearchFeature()) {
  $admin->print_error($feedback->error);
}

// Optionen
$feedback_options = new sql_feedback_options();

if (!$feedback_options->sql_deleteTable()) {
  $admin->print_error($feedback_options->error);
}

?>