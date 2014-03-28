<?php
include_once "controller/Ajax.php";

class ControllerAjaxObjectMap extends ControllerAjax{
    protected $View = NULL;
    
    public function __construct($route) {
        parent::__construct($route);
    }
    
    protected function removeobject($map,$id){
        
    }
    
    protected function addobject($map,$type,$positionleft,$positiontop){
        print_r('addobject');
        print_r($type);
        print_r($positionleft);
        print_r($positiontop);
        
    }
    
    protected function moveobject($map,$id,$positionleft,$positiontop){
        
        print_r($id);
        print_r($positionleft);
        print_r($positiontop);
    }
}
?>