<?php defined('SYSPATH') or die('No direct script access.');

/**root router **/
$router->map('/', array('controller' => 'home')); 
$router->map('/login', array('controller' => 'auth', 'action' => 'login'));
$router->map('/logout', array('controller' => 'auth', 'action' => 'logout'));

/*example routing 
$router->map('/profile/:action', 
              array('controller' => 'profile')); // will call controller "Profile" with dynamic method ":action()"

//routing with multi parameter
$router->map('/read/:year/:month/:day', array('controller' => 'article','action' => 'view')); 
$router->map('/users/:id', 
              array('controller' => 'users',
              		'action' =>'show'), 
                      array('id' => '[\d]{1,8}')
              ); // define filters for the url parameters
*/