<?php defined('SYSPATH') or die('No direct script access.');

class Home_Controller extends Application_Controller {
  
  protected $before_filter = array('name' => 'login_required');
  
  public function index(){
    $filter = new Filter_Lib; 
    $data= array('test' => 'coba');
    $this->loadView('index',$data);
  }
  
  public function view(){
   $users = User::find('all');
   foreach($users as $user){
     echo $user->id;
     echo $user->name;
   }
   
  }
  
  public function js(){
    $this->loadJs('home',array('x' => 12));
  }
}