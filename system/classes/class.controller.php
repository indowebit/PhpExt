<?php defined('SYSPATH') or die('No direct script access.');

class Controller {
  
  protected $params;
  
  public function doBeforeFilter($called_function){
    
    if (isset($this->before_filter)){
      if(!isset($this->before_filter['name'])){
        die('before filter name must be set');
      }else{
        if (method_exists($this,$this->before_filter['name'])){
          if(isset($this->before_filter["except"]) && isset($this->before_filter["only"])){
            die("BeforeFilter: Filter can only run either \"except\" or \"only\"");
          }else{
             if(isset($this->before_filter["except"])){
               if(!empty($this->before_filter["except"])){
                 if(!in_array($called_function, $this->before_filter["except"])){
                   call_user_func(array($this,$this->before_filter["name"]));
                 }
               }else{
                 call_user_func(array($this,$this->before_filter["name"]));
               }
             }else{
                if(isset($this->before_filter["only"])){
                  if(!empty($this->before_filter["only"])){
                    if(in_array($called_function, $this->before_filter["only"])){
                        call_user_func(array($this,$this->before_filter["name"]));
                    }
                  }else{
                        call_user_func(array($this,$this->before_filter["name"]));
                  }
                }else{
                  call_user_func(array($this,$this->before_filter["name"]));
                }               
             }
          }
        }else{
           die("BeforeFilter: Function \"".$this->before_filter["name"]."\" does not exists");
        }
      }
    }
  }
  
  public function setParams($params){
    $this->params = $params;
  }
  
  private function getName(){
    $class_name = strtolower(get_class($this));
    $class_name = str_replace(strtolower(CONTROLLER_NAMESPACE),'',$class_name); 
    return $class_name; 
  }
    
  protected function get($var){
    if (isset($_GET[$var]))
      return $_GET[$var];
    else
      return false;      
  }
  
  protected function post($var){
    if (isset($_POST[$var]))
      return $_POST[$var];
    else
      return false;
  }
  
  protected function loadView($view,$vars=array()){
     $class_name = $this->getName();
     $path = APPPATH . 'views/'.$class_name.'/'.$view.EXT; 
     if (file_exists($path)){
       if (count($vars) >0 )
         extract($vars, EXTR_PREFIX_SAME, "wddx");
         $helper = new Helper; 
         $helper->loadAppHelper($class_name);
         require_once $path;
     }else{
       die('view not exist : '.$path); 
     }
  }

  protected function loadJs($js,$vars=array()){    
    $path = APPPATH . 'js/'.strtolower($js).'.js'; 
    if (file_exists($path)){
            
    	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    	header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . 'GMT');
    	header('Cache-Control: no-cache, must-revalidate');
    	header('Pragma: no-cache');
    	header('Content-Type: text/javascript');  
    	    
        echo "var php_base_url = '".BASE_URL. "';\n"; 
        if (is_array($vars)){
           echo 'var php_data = '.json_encode($vars).";\n"; 
        }
        $file = file_get_contents($path); 
        echo stripslashes(trim($file)); 
        
    }else{
      die('js file not exist : '. $path); 
    }
  }
  
}
