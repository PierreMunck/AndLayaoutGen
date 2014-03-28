<?php
include_once "Controller.php";
include_once "view/Html.php";
include_once "view/Index.php";

class ControllerIndex extends Controller{
	protected $View = NULL;
	
	public function __construct($route) {
		parent::__construct($route);
	}

    public function index() {
        $this->View = new ViewHtml(NULL,$this->appDir);
        $this->View->addcss('css/app.css');
        $this->View->addScript('jquery/jquery.js');
        $this->View->addScript('jquery/ui/jquery.ui.core.min.js');
        $this->View->addScript('jquery/ui/jquery.ui.widget.min.js');
        $this->View->addScript('jquery/ui/jquery.ui.mouse.min.js');
        $this->View->addScript('jquery/ui/jquery.ui.draggable.min.js');
        $this->View->addScript('jquery/ui/jquery.ui.droppable.min.js');
        $this->View->addScript('js/app.js');
        $index = new ViewIndex();
        $this->View->setBody($index);
        return $this->View;
    }
}
?>