<?php
include_once "view/Html.php";
include_once "view/AndXml.php";

class ViewIndex extends View{
    
    protected $templateContent = "index.phtml";
    protected $ObjectMap = "main.xml";
    protected $ObjectMapDir = "temporal/UIAlertDialog";
    
    public function __construct($viewDir = NULL,$appDir = NULL){
        parent::__construct($viewDir,$appDir);
        
    }
    
    public function getFileMap(){
        return $this->ObjectMapDir.$this->ObjectMap;
    }
    
    public function content(){
        $content = new ViewAndXml();
        $content->setTemplateDir($this->ObjectMapDir);
        $content->setTemplate($this->ObjectMap);
        
        $content = $content->render();
        return $content;
    }
}
?>