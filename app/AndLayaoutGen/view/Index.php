<?php
include_once "View/Html.php";
include_once "View/AndXml.php";

class ViewIndex extends View{
    
    protected $templateContent = "index.phtml";
    
    public function content(){
        $content = new ViewAndXml();
        $content->setTemplateDir('temporal/UIAlertDialog/');
        $content->setTemplate('main.xml');
        
        $content = $content->render();
        return $content;
    }
}
?>