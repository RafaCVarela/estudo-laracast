<?php


namespace Core;
use Core\Response;


class Router {

    protected $routes = [];
    protected $methods = ['GET', 'POST', 'DELETE', 'PATCH', 'PUT'];
    
    public function __call ($name, $arguments) {

        $method = strtoupper($name);

        if (in_array($method, $this->methods)) {
            [$uri, $controller] = $arguments;
            $this->routes[] = compact('method', 'uri', 'controller');
            return;
        }

        $this->abort(Response::HTTP_NOT_FOUND);
    }


    public function get($uri, $controller) {
        $this->__call('GET', [$uri, $controller]);
    }

    
    public function post($uri, $controller) {
        $this->__call('POST', [$uri, $controller]);
    }


    public function delete($uri, $controller) {
        $this->__call('DELETE', [$uri, $controller]);
    }


    public function patch($uri, $controller) {
        $this->__call('PATCH', [$uri, $controller]);
    }
    

    public function put($uri, $controller) {
        $this->__call('PUT', [$uri, $controller]);
    }


    public function route($uri, $method)
    {
        
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require basePath($route['controller']);
            }
        }

        $this->abort();
    }

    
    protected function abort ($errorCode = Response::HTTP_NOT_FOUND) {
    
        $error = [
            // Response::HTTP_NOT_AUTHORIZED => view('401'),
            Response::HTTP_FORBIDDEN => basePath('views/403'),
            Response::HTTP_NOT_FOUND => basePath('views/404'),
            // Response::HTTP_NOT_ALLOWED => view('405')
        ];

        if (array_key_exists($errorCode, $error)){
            require $error[$errorCode];
        }

        die();
    }

}
