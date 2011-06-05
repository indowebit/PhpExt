<?php defined('SYSPATH') or die('No direct script access.');

$db_connections = array(
  'development' => array(
      'host'	 => 'localhost',
      'type'     => 'mysql',
      'user'     => 'root',
      'password' => 'root',
      'database' => 'db_php_ext_development'
    ),
   'production'	=> array(
      'host'	=> 'localhost',
      'type'	=> 'mysql',
      'user'	=> 'root',
      'password'=>  '',
      'database'=>  'db_php_ext_production'
    )
);