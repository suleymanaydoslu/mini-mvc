<?php

/**
 * App Core Class
 * Creates url and loads core controller
 * URL Format : /controller/method/params
 */

class Core{

    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();

        //finding controller
        if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){

            //if exists set as controller
            $this->currentController = ucwords($url[0]);
            //unset zero index
            unset($url[0]);
        }

        // require controller
        require_once '../app/controllers/'. $this->currentController . '.php';

        // instantiate controller class
        $this->currentController = new $this->currentController;

        // check for method.
        if(isset($url[1])){
            // check if method is exists

            if(method_exists($this->currentController,$url[1])){

                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        //get params
        $this->params = $url ? array_values($url) : [];


        //call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl()
    {
        if(isset($_GET['url'])){

            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
        }
    }

    public function edit()
    {
        
    }
}