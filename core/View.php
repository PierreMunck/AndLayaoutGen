<?php

class View{
	protected $templateDir = "templates";
	protected $templateContent = "index.phtml";
    protected $appDir = NULL;
	
    public function __construct($viewDir = NULL,$appDir = NULL){
        if(isset($viewDir)){
            $this->templateDir = $viewDir;
        }
        if(isset($appDir)){
            $this->appDir = $appDir;
        }
    }
    
    public function setTemplateDir($templateDir){
        $this->templateDir = $templateDir;
    }
    
    public function setTemplate($templateName){
        $ext = pathinfo($templateName, PATHINFO_EXTENSION);
        if(!isset($ext) || $ext == ''){
            $templateName .= ".phtml";
        }
        $this->templateContent = $templateName;
    }
    
	public function render($templateName = NULL){
	    
		if(isset($templateName)){
			$this->templateContent = $templateName;
		}
        ob_start();
        include $this->templateDir.'/'.$this->templateContent;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
	}

}