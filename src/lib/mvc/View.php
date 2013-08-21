<?php
class Lib_Mvc_View {
	
	private $_name = null;
	private $_layout = null;
	private $_data = null;
	
	private $content = null;
	
	function __construct() {
		$this->_layout = APP_DEFAULT_LAYOUT;
	}
	
	public function setName($nameView){
		$this->_name = $nameView;
	}
	
	public function getName(){
		return $this->_name;
	}
	
	public function render(){
		
		$this->fillContent();
		
		if(file_exists(PATH_APP . '/layouts/'.$this->_layout.'.php') && is_readable(PATH_APP . '/layouts/'.$this->_layout.'.php') ){
			if( !is_null($this->_data) && is_array($this->_data) ){
				extract($this->_data,EXTR_OVERWRITE);
			}
			include PATH_APP . '/layouts/'.$this->_layout.'.php';
		} 
		
		
	}
	
	private function fillContent(){
		$requestRooter = Application::get('request');
		ob_start();
		$file = PATH_APP . '/modules/'.$requestRooter['module'].'/views/'.strtolower($requestRooter['controller']).'/'.$requestRooter['action'].'.php';
		if ( file_exists($file) && is_readable($file)) {

			if (!is_null($this->_data) && is_array($this->_data) ) {
				extract($this->_data,EXTR_OVERWRITE);
			}
			include $file;
		} else{
                    echo 'no existe la vista:'.$file;
                }
		
		$content = ob_get_contents();
		ob_end_clean();
		
		$this->content = $content;
	}
	
	public function getContent(){
		return $this->content;
	}
	
	public function setData($data){
		if(is_array($data) ){
			$this->_data = $data;
		}
	}
	
	public function setLayout($layout){
		$this->_layout = $layout;
	}
}
