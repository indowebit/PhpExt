<?php defined('SYSPATH') or die('No direct script access.');

/**Generate Router **/

$router = new Router; 

$dispatcher = new Dispatcher; 
$dispatcher->setSuffix(''); 
$dispatcher->setClassPath(APPPATH . '/controller'); 

$std_route = new Route('/:class/:method/:id');
$std_route->addDynamicElement(':class', ':class')
          ->addDynamicElement(':method', ':method')
          ->addDynamicElement(':id', ':id');

$router->addRoute( 'std', $std_route );

//Set up your default route:
$default_route = new Route('/');
$default_route->setMapClass('default')->setMapMethod('index');
$router->addRoute( 'default', $default_route);

$url = urldecode($_SERVER['REQUEST_URI']);
$url = str_replace($base_path,'',$url); 

$found_route = $router->findRoute($url); 

echo $found_route->getMapClass() . '<br>'; 
echo $found_route->getMapMethod(). '<br>'; 
print_r($found_route->getMapArguments()); 

/**End of Router **/ 
