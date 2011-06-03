<?php defined('SYSPATH') or die('No direct script access.');

require SYSPATH .'config/config.php';

//load classes from classes directories
foreach ($system_classses as $file){
  $file = SYSPATH .'classes/'. $file; 
  if (file_exists($file)){
    require $file; 
  }
}

//load helper from classes directories
foreach ($helper_function as $file){
  $file = SYSPATH .'helper/'. $file; 
  if (file_exists($file)){
    require $file; 
  }
}

//load library from classes directories
foreach ($library_classes as $file){
  $file = SYSPATH .'library/'. $file; 
  if (file_exists($file)){
    require $file; 
  }
}

//unset variable 
unset($system_classses,$helper_function,$library_classes); 


