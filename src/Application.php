<?php

/**
 *
 * Proyect Name: mini-linker-core
 * Linkerweb Corporation.
 *
 * description: framework sencillo para la creacion de sitios pequeños pero bien
 *               estructurados y con buenas practicas
 *
 *
 * @author Uriel isai Rodriguez rivas <isairivas@gmail.com>
 *
 */
class Application {

    protected $displayError = '-1';
    protected $request = array();
    protected $env = null;
    private static $renderView = true;
    public static $urls;
    public static $registry = array();
    public static $view = null;

    public function __construct() {

        session_start();
        $this->env = 'test';
        $this->initConstantes();
        $this->addConfigs();
        if (DISPLAY_ERRORS) {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }

        $this->initAutoload();
        self::$view = new Lib_Mvc_View();
    }

    public function initAutoload() {
        include_once PATH_APP . '/lib/core/functions.php';
        include_once dirname(__FILE__) . '/autoload.php';
    }

    public function run() {
        $rooter = new Lib_Core_Rooter();
        try {
            $rooter->dispatch();
        } catch (Exception $e) {
            $rooter->dispatchError($e);
        }

        if (self::$renderView) {
            self::$view->render();
        }
    }

    private function initConstantes() {

        $partes = explode('/', $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
        unset($partes[count($partes)-1]);
        $HOME = 'http://'.implode('/', $partes);
        $sourcePath = dirname(__FILE__);
        define('PATH_APP', $sourcePath);
        define('PATH_CONFIG', PATH_APP . '/../configs');
        define('HOME', $HOME);
    }

    public static function set($name, $value) {
        self::$registry[$name] = $value;
    }

    public static function get($name) {
        return self::$registry[$name];
    }

    private function addConfigs() {
        include_once PATH_CONFIG . '/init.config.php';
        include_once PATH_CONFIG . '/application.config.php';
        include_once PATH_CONFIG . '/url.config.php';
    }

    public static function setRenderView($render) {
        if (is_bool($render)) {
            self::$renderView = $render;
        }
    }
}