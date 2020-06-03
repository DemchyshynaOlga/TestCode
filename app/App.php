<?php

class App
{
    /**
     * include 'controllers/IndexController.php'
     * include 'views/index.php'
     * Auth::check method for check authentication
     */
    public static function load()
    {
        require_once('controllers/IndexController.php');
        require_once('views/index.php');
        Config::init();

        if (empty($_SERVER['HTTP_APIKEY']) || !Auth::check($_SERVER['HTTP_APIKEY'])) {
            header('HTTP/1.0 401 Unauthorized');
            exit;
        } else {
            $contentTypes = Config::getField('contentType');
            $type = isset($contentTypes[$_SERVER['CONTENT_TYPE']]) ? $contentTypes[$_SERVER['CONTENT_TYPE']] : null;
  
            if ($type && !empty($_GET['values'])) {
                
                $data = !is_array($_GET['values'])
                    ? Helper::prepareRequestData($type, $_GET['values'])
                    : $_GET['values'];

                $controller = new IndexController();
                $controller->actionIndex($data, $type);
            } else {
                header('HTTP/1.0 400 Bad request');
                exit;
            }
        }
    }
}