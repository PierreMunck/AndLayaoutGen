<?php
include_once "View.php";
include_once "View/Html/Header.php";

class ViewHtml extends View{
    
    private $head = NULL;
    private $body = NULL;
    private $footer = NULL;
    
    public function __construct($viewDir = NULL, $appDir = NULL){
        parent::__construct($viewDir, $appDir);
        $this->head = new ViewHtmlheader($viewDir, $appDir);
        $this->head->setTemplate('header');
        $this->body = new View($viewDir, $appDir);
        $this->body->setTemplate('index');
        $this->footer = new View($viewDir, $appDir);
        $this->footer->setTemplate('footer');
    }
    
    public function addcss($url){
        $this->head->addCss($url);
    }
    
    public function addScript($url){
        $this->head->addScript($url);
    }
    
    public function render(){
        $content = ''; 
        $content .= $this->head->render();
        $content .= $this->body->render();
        $content .= $this->footer->render();
        return $content;
    }
    
    public function setBody($view){
        if(is_a($view,'View')){
            $this->body = $view;
        }
    }
    
    public function setHead($view){
        if(is_a($view,'View')){
            $this->head = $view;
        }
    }
    
    public function setFooter($view){
        if(is_a($view,'View')){
            $this->footer = $view;
        }
    }
}
?>