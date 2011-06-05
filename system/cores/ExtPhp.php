<?php defined('SYSPATH') or die('No direct script access.');

/**Build Connection with ActiveRecord **/
$connections = array(); 
foreach($db_connections as $key=>$val){
    $str_connect = '%s://%s:%s@%s/%s';
    $str_connect = sprintf($str_connect,
                            $val['type'],
                            $val['user'],
                            $val['password'],
                            $val['host'],
                            $val['database']
                   ); 
   $connections[$key] = $str_connect;                         
}

ActiveRecord\Config::initialize(function($cfg) use ($connections){
  $cfg->set_model_directory(APPPATH.'models');
  $cfg->set_connections($connections);  
  $cfg->set_default_connection(ENV_MODE);
});

unset($connections,$db_connections);

/** End of Active Record **/

/**Generate Router **/
$dispatcher = new Dispatcher; 
$dispatcher->setSuffix(strtolower(CONTROLLER_NAMESPACE)); 
$dispatcher->setClassPath(APPPATH . '/controllers'); 

$router->default_routes();
$router->execute();

if ($router->route_found){  
  try{    
    $dispatcher->dispatch($router);     
  }catch(Exception $e){
    echo $e->getMessage();
    die();
  }
  
}else{
  echo "<b>Route Url not Found </b> ". $_SERVER['REQUEST_URI']; 
  die();
}

/**End of Router **/ 
