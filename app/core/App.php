<?php

class App
{
    protected $controller = "home";
    protected $method = "index";
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // controller
        if (file_exists("../app/controllers/" . ucfirst($url[0] ?? "") . ".php")) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once "../app/controllers/" . ucfirst($this->controller) . ".php";
        $this->controller = new $this->controller;

        // method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // run controller and methods, also send params if exists
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (!isset($_GET["url"])) {
            return [];
        }

        $url = rtrim($_GET["url"], "/");
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode("/", $url);
        return $url;
    }
}
