<?php defined('SYSPATH') or die('No direct script access.');

//load configuration 
require DOCROOT .'config/application.php'; 
require DOCROOT . 'config/database.php'; 

//adding router
$router = new Router; 
require DOCROOT . 'config/routes.php'; 

//load app controllers
spl_autoload_register('appctr_autoload');
function appctr_autoload($class_name){
  $found = preg_match("/".CONTROLLER_NAMESPACE."/i",$class_name);  
  if ($found){
     $file = APPPATH.'controllers/'. strtolower($class_name) . EXT; 
     $file = strtolower($file);
     if (file_exists($file))
       require_once $file;
  }    
}

//load app library 
spl_autoload_register('applib_autoload');
function applib_autoload($class_name){
  $found = preg_match("/_lib/i",strtolower($class_name)); 
  if ($found){
    if (file_exists(APPPATH.'libraries/'.strtolower($class_name).EXT)){
    require_once APPPATH.'libraries/'.strtolower($class_name).EXT;
  }    
  }
}



//load core of ExtPHP
require SYSPATH . 'cores/ExtPhp.php';
