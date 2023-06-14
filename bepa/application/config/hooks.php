<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
/*(
$hook['post_controller_constructor'] = array(
		'class'    => 'System_config',
		'function' => 'index',
		'filename' => 'System_config.php',
		'filepath' => 'hooks'
);
*/

/*
$hook['post_controller_constructor'] = array(
'class'    => 'Page_build',
'function' => 'index',
'filename' => 'Page_build.php',
'filepath' => 'hooks',
'params'   => array('head')
);
*/

$hook['post_controller_constructor'] = array(
	'class'    => 'Page_build',
	'function' => 'head_check',
	'filename' => 'Page_build.php',
	'filepath' => 'hooks',
	'params'   => ''
);
