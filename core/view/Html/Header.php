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
        if(nibsa_file_exists(trim($this->appDir,"/")."/".$url)){
            $this->scriptList[] = "/".trim($this->appDir,"/")."/".$url;
        }elseif(nibsa_file_exists("core/js/".$url)){
            $this->scriptList[] = "/core/js/".$url;
        }
    }
    
    public function addCss($url){
        if(nibsa_file_exists(trim($this->appDir,"/")."/".$url)){
            $this->cssList[] = "/".trim($this->appDir,"/")."/".$url;
        }elseif(nibsa_file_exists("core/css/".$url)){
            $this->cssList[] = "/core/css/".$url;
        }
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