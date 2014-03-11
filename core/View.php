<?php

class View{
	protected $templateDir = "templates";
	protected $templateContent = "index";
    protected $appDir = NULL;
	
    public function __construct($viewDir = NULL,$appDir = NULL){
        if(isset($viewDir)){
            $this->templateDir = $viewDir;
        }
        if(isset($appDir)){
            $this->appDir = $appDir;
        }
    }
    
    public function setDefaultTemplate($templateName){
        $this->templateContent = $templateName;
    }
    
	public function render($templateName = NULL){
	    
		if(isset($templateName)){
			$this->templateContent = $templateName;
		}
		include $this->templateDir.'/'.$this->templateContent.".phtml";
	}

}