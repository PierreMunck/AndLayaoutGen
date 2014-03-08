<?php

class View{
	private $templateDir = "templates";
	private $templateContent = "index";
	
    public function __construct($viewDir = NULL){
        if(isset($viewDir)){
            $this->templateDir = $viewDir;
        }
        set_include_path($this->templateDir);
    }
    
	public function render($templateName = NULL){
	    
		if(isset($templateName)){
			$this->templateContent = $templateName;
		}
		include $this->templateContent.".phtml";
	}

}