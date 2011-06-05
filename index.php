<?php

if (!defined('PHP_VERSION_ID') || PHP_VERSION_ID < 50300)
	die('Ext-PHP requires PHP 5.3 or higher');
	
	
error_reporting(E_ALL | E_STRICT);


$application = 'app'; 
$system = 'system'; 

define('EXT','.php'); 
define('CONTROLLER_NAMESPACE','_Controller'); 

// Set the full path to the docroot
define('DOCROOT', realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR);

// Make the application relative to the docroot, for symlink'd index.php
if ( ! is_dir($application) AND is_dir(DOCROOT.$application))
	$application = DOCROOT.$application;
	
// Make the system relative to the docroot, for symlink'd index.php
if ( ! is_dir($system) AND is_dir(DOCROOT.$system))
	$system = DOCROOT.$system;
	
// Define the absolute paths for configured directories
define('APPPATH', realpath($application).DIRECTORY_SEPARATOR);
define('SYSPATH', realpath($system).DIRECTORY_SEPARATOR);

// Clean up the configuration vars
unset($application, $system);


if (is_dir('install'))
{
  //die('installation directory is exist, please remove or rename it'); 
}


// Bootstrap the application
require SYSPATH.'loader'.EXT; 
require APPPATH.'loader'.EXT;
