<?php defined('SYSPATH') or die('No direct script access.');

class Helper {
  
  public function __construct(){
    global $helper_sys_function; 
    $this->loadSysHelper($helper_sys_function);
  }
  
  public function loadAppHelper($helper_name){
    $path = APPPATH . 'helpers/'.strtolower($helper_name).'_helper'.EXT; 
    if (file_exists($path))
      require_once $path; 
  }
  
  private function loadSysHelper($helpers){
    foreach ($helpers as $helper){
      $path = SYSPATH.'helpers/'.strtolower($helper).'_helper'.EXT; 
      if (file_exists($path))
        require_once $path; 
    }
  }
}