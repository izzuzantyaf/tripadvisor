<?php

class App
{
    // default controller
    protected $controller = 'Home';
    // default method
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        // catch controller, method, and params from URL
        $url = $this->parseURL();

        // if controller exists
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            if (($this->controller == "admin" || $this->controller == "Admin") && !isset($_SESSION["admin_logged"])) {
                $url[1] = "login";
                // var_dump($url[1]);
                // header("Location: " . BASEURL . "/admin/login");
            }
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;


        if (isset($url[1])) {
            // if method exists
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        if (!empty($url)) {
            $this->params = array_values($url);
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // function for retrieving controller, method, and params from URL
    public function parseURL()
    {
        if (isset($_GET['url'])) {
            // remove the slash in the end of the URL
            $url = rtrim($_GET['url'], '/');
            // sanitize URL from undesired characters
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // explode URL based on slash char
            $url = explode('/', $url);

            // this return is array
            return $url;
        }
    }
}
