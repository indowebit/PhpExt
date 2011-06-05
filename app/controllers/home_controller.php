<?php defined('SYSPATH') or die('No direct script access.');

class Home_Controller extends Application_Controller {
  
  protected $before_filter = array('name' => 'login_required');
  
  public function index(){
    $filter = new Filter_Lib; 
    $data= array('test' => 'coba');
    $this->loadView('index',$data);
  }
  
  public function view(){
   print_r($this->params);
  }
  
  public function js(){
    $this->loadJs('home',array('x' => 12));
  }
}