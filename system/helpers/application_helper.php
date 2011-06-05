<?php defined('SYSPATH') or die('No direct script access.');

function js_tag($file){
  $str = '<script type="text/javascript" src="'.BASE_URL.'/public/js/'.$file.'"></script>';
  return $str;    
}