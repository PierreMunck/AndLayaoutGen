<?php
include_once "view/Html.php";

class ViewAndXml extends View{
    
    public function render(){
        $content = parent::render();
        
        $content = str_replace('<?xml version="1.0" encoding="utf-8"?>', '', $content);
        return $content;
    }
}
?>