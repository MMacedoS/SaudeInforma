<?php

class Routers {
    protected string $controller = 'SiteController';
    protected string $method = 'index';
    protected array $parameters = [];

    public function __construct(){
        $this->prepareUrl();
    }

    public function prepareUrl() {
        $url = filter_input(INPUT_GET, 'pag', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $urlParts = !empty($url) ? explode('/', $url) : [];

        if (empty($urlParts)) {            
            return;
        }

        $controllerName = $urlParts[0] . 'Controller';
   
        $controllerPath = $this->getControllerPath($controllerName);
        
        if (!empty($controllerPath)) {
            $this->controller = $controllerName;

            if (count($urlParts) > 1) {
                array_shift($urlParts);

                $this->method = isset($urlParts[0]) ? $urlParts[0] : 'index';
                array_shift($urlParts);

                $this->parameters = $urlParts;
            } else {
                $this->method = 'index';
            }

            return;
        }
        // // Redirecionar para a página de login
        // $this->controller = 'LoginController';
        // $this->method = 'index';
    }

    public function run()
    {
        if ($this->isRouteValid()) {
            $controller = new $this->controller;
            if (method_exists($controller, $this->method)) {
                call_user_func_array([$controller, $this->method], $this->parameters);
                return;
            }
        }

        // Rota inválida ou método não encontrado
        // Redirecionar para página de erro ou retornar resposta 404
    }

    private function isRouteValid()
    {
        $allowedControllers = [
            'SiteController', 
            'LoginController',
            'AdministrativoController',
            'VacinaController',
            'GestanteController',
            'DentistaController',
            'ConsultaController'
        ];
        //nomes das funçoes
        $allowedMethods = [
            'index',
            'auth',
            'logouf',
            'getAllVacina',
            'addVacina',
            'updVacina',
            'findById',
            'getAllConsulta',
            'addConsulta',
            'updConsulta',
            'getAllDentista',
            'addDentista',
            'updDentista',
            'getAllGestante',
            'addGestante',
            'updGestante'
        ];

        $controllerPath = $this->getControllerPath($this->controller);

        if (file_exists($controllerPath)) {
            return in_array($this->controller, $allowedControllers) && in_array($this->method, $allowedMethods);
        }

        return false;
    }

    private function getControllerPath($controllerName)
    {
        $controllerPaths = [
            __DIR__ . '/../Controllers/' . $controllerName . '.php',
        ];

        foreach ($controllerPaths as $path) {
            if (file_exists($path)) {
                return $path;
            }
        }

        return '';
    }
}