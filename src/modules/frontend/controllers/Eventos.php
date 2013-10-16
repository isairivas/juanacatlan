<?php
class Module_Frontend_Controller_Eventos extends Lib_Mvc_Controller {
	private $model;
	public function __construct(){
		parent::__construct();
		Application::set('menu-active','5');
		$this->model = new Model_Eventos(); 
	}

	public function index() {
		$params = explode('/', $_SERVER['REQUEST_URI']);
		$month;
		//Si nos pasaron la fecha y es un mes válido
		if (isset($params[2]) && $params[2] > 0 && $params[2] <= 12) {
			$month = $params[2];
		//sino consultamos el mes actual
		} else {
			$d = date_parse_from_format("Y-m-d", date("Y-m-d"));	
			$month = $d["month"];
		}

		$eventos = $this->model->getMonth(lcfirst($month));
		
		$data  = array(
			'eventos' =>  $eventos,
			'meses' => getMonth(),
			'actual' => $month
			);
		Application::$view->setData($data);
	}

}