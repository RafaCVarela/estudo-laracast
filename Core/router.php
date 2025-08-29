<?php


namespace Core;
use Core\Middleware\Middleware;
use Core\Response;
use core\Authenticator;


class Router {

    protected $routes = [];
    protected $methods = ['GET', 'POST', 'DELETE', 'PATCH', 'PUT'];
    
    public function __call ($name, $arguments) {

        $method = strtoupper($name);

        if (in_array($method, $this->methods)) {
            [$uri, $controller] = $arguments;
            $this->routes[] = compact('method', 'uri', 'controller');
            return $this;
        }

        $this->abort(Response::HTTP_NOT_FOUND);
    }


    public function get($uri, $controller) {
        $this->__call('GET', [$uri, $controller]);
        return $this;
    }

    
    public function post($uri, $controller) {
        $this->__call('POST', [$uri, $controller]);
        return $this;
    }


    public function delete($uri, $controller) {
        $this->__call('DELETE', [$uri, $controller]);
        return $this;
    }


    public function patch($uri, $controller) {
        $this->__call('PATCH', [$uri, $controller]);
        return $this;
    }
    

    public function put($uri, $controller) {
        $this->__call('PUT', [$uri, $controller]);
        return $this;
    }

    public function only($key){
        // Marca a última rota registrada
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function route($uri, $method)
    {
        
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                
                Middleware::resolve($route['middleware'] ?? null);


                return require basePath('Http/controllers/' . $route['controller']);
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
