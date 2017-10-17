<?php

// prevent this file from being accesses directly
if(defined('WB_PATH') == false) {
	exit("Cannot access this file directly"); }

require_once(WB_PATH.'/modules/feedback/info.php');
require_once(WB_PATH.'/modules/feedback/class.parser.php');

$parser = new templateParser();
$parser->add('version', $module_version);
$parser->parseTemplateFile(WB_PATH.'/modules/feedback/help/'.basename(dirname(__FILE__)).'/content.htt');
$parser->echoHTML();

?>