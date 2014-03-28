<?php

include_once 'functions.php';

class App{
	
	private $AppPath = NULL;
    private $AppName = NULL;
	private $Config = NULL;
	private $ConfigDir = NULL;
	private $baseUrl = NULL;
	private $controler = NULL;
	
	
	public function __construct($appName) {
	    $this->AppName = $appName;
	    $appdir = realpath(dirname(__FILE__).'/../app').'/'.$this->AppName;
        $this->AppPath = explode(PATH_SEPARATOR, get_include_path());
	    if(is_dir($appdir)){
	        $this->AppPath[] = realpath($appdir);
            $this->ConfigDir = realpath($appdir);
	    }else{
	        $this->AppPath[] = realpath(dirname(__FILE__));
	    }
		$this->setConf($appName);
		$this->AppPath[] = realpath(dirname(__FILE__));
	}
	
	protected function setConf($confName) {
		if(isset($confName) && is_string($confName)){
			$confFile = $confName.'.conf.php';
		}
		if(isset($confFile) && is_string($confFile) and file_exists($this->ConfigDir. DIRECTORY_SEPARATOR .$confFile)){
			$this->loadConf(parse_ini_file ( $this->ConfigDir. DIRECTORY_SEPARATOR .$confFile, TRUE));
		}
	}
	
	protected function loadConf($config) {
		$this->Config = $config;
		if(isset($this->Config['base'])){
			$this->baseUrl = $this->Config['base'];
		}
	}
	
	protected function setToIncludePath($path) {
		$this->AppPath[] = $path;
	}
	 
	public function run() {
	    
		// cargar el applicacion path
		$include_path = implode(PATH_SEPARATOR, $this->AppPath);
		set_include_path($include_path);
        
        // recuperar el controller
		include_once "Route.php";
		$route = new Route($this->baseUrl);
        $route->match($this->Config['route']);
        
		$controllerName = $route->getClass();
		$controllerMethod = $route->getMethod();
		$includeController = $route->getInclude();
        
        include_once $includeController;
        $this->controler = new $controllerName($route);
        $this->controler->setViewsDir(realpath(dirname(__FILE__).'/../app').'/'.$this->AppName.'/templates');
        $this->controler->setAppDir('/app/'.$this->AppName);
		$view = $this->controler->$controllerMethod();
        
        if(isset($view)){
            print $view->render();
        }
	}
    
    public function runAjax($request) {
        
        // cargar el applicacion path
        $include_path = implode(PATH_SEPARATOR, $this->AppPath);
        set_include_path($include_path);
        
        if(!isset($request['type'])){
            die();
        }
        if(!isset($request['action'])){
            die();
        }
        // recuperar el controller
        include_once "Route.php";
        $route = new Route($request['type']."/".$request['action']);
        $route->match($this->Config['route']);
        
        
        $controllerName = $route->getClass();
        $controllerMethod = $route->getMethod();
        $includeController = $route->getInclude();
        include_once $includeController;
        $this->controler = new $controllerName($route);
        $this->controler->setViewsDir(realpath(dirname(__FILE__).'/../app').'/'.$this->AppName.'/templates');
        $this->controler->setAppDir('/app/'.$this->AppName);
        $view = $this->controler->$controllerMethod();
        
        if(isset($view)){
            print $view->render();
        }
    }
}
?>