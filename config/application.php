<?php defined('SYSPATH') or die('No direct script access.');

$base_path = '/phpext'; 
$index_file = 'index.php'; 
$environment = 'development';





/**define constant variable do not edit **/ 
define('BASE_URL',$base_path);
define('INDEX_FILE',$index_file); 
define('ENV_MODE',$environment);

unset($base_path,$index_file,$environment); 
