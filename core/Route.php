<?php

class Route{
	
	public static $UrlParse = NULL;
    public static $params = NULL;
    private $classdir = NULL;
    private $classfile = NULL;
    private $class = 'ControllerIndex';
    private $method = 'index';
	
	public function __construct($base = NULL)
	{
		// cargar el uri request
		if(isset($base)){
			$uri = str_replace($base, "", $_SERVER['REQUEST_URI']);
		}else{
			$uri = $_SERVER['REQUEST_URI'];
		}
		
        $this->parseuri($uri);
	}
    
    private function parseuri($uri){
        $explode = parse_url($uri);
        
        // uri
        $uri = $explode['path'];
        $uri = strtolower(trim($uri, '/'));
        $uri = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $uri);
        $uri = strtolower($uri);
        self::$UrlParse = explode('/',$uri);
        
        if(isset($explode['query'])){
            $params = explode('&',$explode['query']);
            if(isset($params) && is_array($params) && sizeof($params) != 0){
                self::$params = array();
                foreach ($params as $param) {
                    $explode = explode('=',$param);
                    self::$params[$explode[0]] = $explode[1];
                }
            }
        }
    }
    
    private function findClassMethod($classmethod){
        $classmethod = explode('.',$classmethod);
        $class = $classmethod[0];
        $method = 'index';
        if(isset($classmethod[1])){
            $method = $classmethod[1];
        }
        $findClass = explode(' ',splitByCaps($class));
        $class = 'Controller'.$class;
        $classfile = '';
        while (sizeof($findClass) > 0 ) {
            $classfile = array_pop($findClass).$classfile;
            $classdir = implode("/",$findClass);
            if($classdir != ''){
                $classdir = 'controller/'.trim($classdir,'/').'/';
            }else{
                $classdir = 'controller/';
            }
            if(nibsa_file_exists($classdir.$classfile.'.php')){
                $this->classdir = $classdir;
                $this->classfile = $classfile.'.php';
                $this->class = $class;
                $this->method = $method;
                return TRUE;
            }
        }
        return FALSE;
    }
    
    
    public function match($routeIndex){
        $matchingList = self::$UrlParse;
        while (sizeof($matchingList) > 0) {
            $matching = implode("/", $matchingList);
            if(isset($routeIndex[$matching])){
                if($this->findClassMethod($routeIndex[$matching])){
                    return $this->class;
                }
            }
            array_pop($matchingList);
        }
    }
    
	public function getClass(){
		return $this->class;
	}
	
	public function getMethod(){
		return $this->method;
	}
    
    public function getInclude(){
        return $this->classdir.$this->classfile;
    }
}