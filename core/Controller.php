<?php
include_once "View.php";

class Controller{
    protected $appDir = NULL;
    protected $viewDir = NULL;
	protected $view = NULL;
    protected $params = NULL;
    protected $route = NULL;
    
	
	public function __construct($route = NULL){
	    $this->route = $route;
        $this->params = ROUTE::$params;
	}
	
    public function setViewsDir($viewDir){
        $this->viewDir = $viewDir;
    }
    
    public function setAppDir($appDir){
        $this->appDir = $appDir;
    }
    
	public function index(){
	    $this->View = new View($this->viewDir);
		return $this->View;
	}
}
?>