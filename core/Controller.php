<?php
include_once "View.php";

class Controller{
    protected $viewDir = NULL;
	protected $view = NULL;
	
	public function __construct(){
	    
	}
	
    public function setViewsDir($viewDir){
        $this->viewDir = $viewDir;
    }
    
	public function index(){
	    $this->View = new View($this->viewDir);
		return $this->View;
	}
}
?>