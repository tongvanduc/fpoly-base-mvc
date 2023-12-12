<?php

namespace Ductong\BaseMvc;

class Router {
    protected $routes = [];

    public function addRoute($route, $controller, $action) {
        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    public function redirect($from, $to) {
        $this->routes['redirect' . $from] = $to;
    }

    public function dispatch($uri) {
        $tmp = explode('?', $uri);
        
        $uri = $tmp[0];

        if (array_key_exists('redirect' . $uri, $this->routes)) {
            header('Location: ' . $this->routes['redirect' . $uri]);
            exit();
        }

        if (array_key_exists($uri, $this->routes)) {
            $controller = $this->routes[$uri]['controller'];
            $action = $this->routes[$uri]['action'];

            $controller = new $controller();
            $controller->$action();
        } else {
            throw new \Exception("No route found for URI: $uri");
        }
    }
}
    