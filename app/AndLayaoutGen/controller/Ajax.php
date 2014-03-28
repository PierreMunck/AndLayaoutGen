<?php
include_once "Controller.php";

class ControllerAjax extends Controller{
	protected $View = NULL;
    protected $method = NULL;
    protected $paramsAjax = NULL;
	
	public function __construct($route) {
		parent::__construct($route);
        if(isset($_REQUEST['action'])){
            $this->method = $_REQUEST['action'];
            unset($_REQUEST['action']);
        }
        $this->paramsAjax = $_REQUEST;
        
	}

    public function index() {
        if(method_exists($this, $this->method)){
            $method = $this->method;
            $rf = new ReflectionMethod($this,$method);
            $numparam = $rf->getNumberOfParameters();
            print_r($this->paramsAjax);
            return call_user_func_array(array($this, $method), array_slice($this->paramsAjax,0,$numparam));
        }
    }
}
?>