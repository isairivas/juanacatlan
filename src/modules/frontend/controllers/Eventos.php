<?php
class Module_Frontend_Controller_Eventos extends Lib_Mvc_Controller {
	private $model;
	private $params;
	public function __construct(){
		parent::__construct();
		Application::set('menu-active','5');
		$this->model = new Model_Eventos(); 
		$this->params = explode('/', $_SERVER['REQUEST_URI']);
	}

	public function index() {
		
		$month;
		$year;
		//Si nos pasaron la fecha y es un mes válido
		if (isset($this->params[3]) && is_numeric($this->params[2]) && $this->params[3] > 0 && $this->params[3] <= 12) {
			$month = $this->params[3];
			$year = $this->params[2];
		//sino consultamos el mes actual
		} else {
			$d = date_parse_from_format("Y-m-d", date("Y-m-d"));	
			$month = $d["month"];
			$year = $d['year'];
		}

		$eventos = $this->model->getMonth($year,lcfirst($month));
		
		$data  = array(
			'eventos' =>  $eventos,
			'meses' => getMonth(),
			'mes' => $month,
			'año' => $year
			);
		Application::$view->setData($data);
	}
	public function desc() {
		$evento;
		if (isset($this->params[2]) && is_numeric($this->params[2])) {
			$evento = $this->model->getEvento($this->params[2]);
		}else{
			$this->redirect('/eventos');
		}
		$otros = $this->model->getAll();
		$data = array(
			'evento' => $evento[0],
			'otros' => $otros
			);
		Application::$view->setData($data);
	}
}