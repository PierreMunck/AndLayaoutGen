<?php
include_once "Controller.php";
include_once "View/Html.php";
include_once "View/Index.php";

class ControllerIndex extends Controller{
	protected $View = NULL;
	
	public function __construct($route) {
		parent::__construct($route);
	}

    public function index() {
        $this->View = new ViewHtml(NULL,$this->appDir);
        $this->View->addcss('css/app.css');
        $this->View->addScript('js/jquery-2.1.0.min.js');
        $this->View->addScript('js/app.js');
        
        $index = new ViewIndex();
        $this->View->setBody($index);
        return $this->View;
    }
}
?>