<?php
class Module_Frontend_Controller_Noticias extends Lib_Mvc_Controller {
	public function page(){
		Application::set('menu-active','4');
        $params = explode('/', $_SERVER['REQUEST_URI']);
        $pag = $params[2];
        $model = new Model_Noticias();
        $news = $model->getNews($pag);
        $pages = intval($model->count() / 4);
        $registros;
        foreach ($news as $n) {
            $cont = $n['contenido'];
            //Reemplaza el contenido original con uno resumido.
            $n['contenido'] = cutTextWithTags($cont);
            $registros[] = $n;
            
        }
        $data = array(
            'registros' => $registros,
            'pages' => $pages,
            'current' => $pag
            );
        Application::$view->setData($data);
	}

	public function id() {
		Application::set('menu-active','4');
	}
}