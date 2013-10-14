<?php
class Module_Frontend_Controller_Noticias extends Lib_Mvc_Controller {
	public function gaceta(){
            
        $params = explode('/', $_SERVER['REQUEST_URI']);
        $pag = $params[2];
        //Si no es un numero default
        if(!is_numeric($pag)){
            $this->redirect('/gaceta/1');
        }
        Application::set('menu-active','4');
        $model = new Model_Noticias();
        $news = $model->getNews($pag);
        //Si nos pasaron una pagina que no es valida redireccionamos al default.
        if(count($news) == 0 ){
            $this->redirect('/gaceta/1');
        }
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

        $params = explode('/', $_SERVER['REQUEST_URI']);
        $id = $params[3];
        if(!is_numeric($id)){
            $this->redirect('/gaceta/1');
        }
        $model = new Model_Noticias();
        $articulo = $model->getArticulo($id);
        $lastNoticias = $model->getNews(1);
        $data = array(
            'articulo' => $articulo[0],
            'lastNoticias' => $lastNoticias
        );
        Application::$view->setData($data);
	}
}