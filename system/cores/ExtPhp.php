<?php defined('SYSPATH') or die('No direct script access.');

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
