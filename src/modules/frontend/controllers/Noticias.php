<?php
class Module_Frontend_Controller_Noticias extends Lib_Mvc_Controller {
	public function gaceta(){
            
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

	public function articulo() {
		Application::set('menu-active','4');
        $model = new Model_Noticias();
        $params = explode('/', $_SERVER['REQUEST_URI']);
        $id = $params[2];
        $articulo = $model->getArticulo($id);
        $data = array(
            'articulo' => $articulo[0]
        );
        Application::$view->setData($data);
	}
}