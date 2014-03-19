<?php
include_once "View.php";

class ViewHtmlheader extends View{
    
    
    private $scriptList = NULL;
    private $cssList = NULL;
    private $metaList = NULL;
    private $linkList = NULL;
    
    public function __construct($viewDir = NULL, $appDir = NULL){
        parent::__construct($viewDir, $appDir);
        $this->templateContent = 'header';
    }
    
    public function addScript($url){
        $this->scriptList[] = "/".trim($this->appDir,"/")."/".$url;
    }
    
    public function addCss($url){
        $this->cssList[] = "/".trim($this->appDir,"/")."/".$url;
    }
    public function addMeta(){
        
    }
    
    public function content(){
        $content = '';
        if(is_array($this->scriptList)){
            foreach ($this->scriptList as  $script) {
                $view = new View('templates/Html');
                $view->setTemplate('script');
                $view->url = $script;
                $content .= $view->render();
            }
        }
        if(is_array($this->cssList)){
            foreach ($this->cssList as  $css) {
                $view = new View('templates/Html');
                $view->setTemplate('css');
                $view->url = $css;
                $content .= $view->render();
            }
        }
        if(is_array($this->metaList)){
            foreach ($metaList as  $meta) {
                $view = new View('templates/Html');
                $view->setTemplate('meta');
                $content .= $view->render();
            }
        }
        if(is_array($this->linkList)){
            foreach ($linkList as  $link) {
                $view = new View('templates/Html');
                $view->setTemplate('link');
                $content .= $view->render();
            }
        }
        return $content;
    }
}
?>