<?php
include_once "View/Html.php";

class ViewAndXml extends View{
    
    public function render(){
        $content = parent::render();
        
        $content = str_replace('<?xml version="1.0" encoding="utf-8"?>', '', $content);
        $content = str_replace('<LinearLayout', '<div lalala class="LinearLayout"', $content);
        $content = str_replace('</LinearLayout', '</div', $content);
        $content = str_replace('<Button', '<div class="Button"', $content);
        $content = str_replace('</Button', '</div', $content);
        return $content;
    }
}
?>