<?php

namespace Core;

class App
{
    private static $routes = [];
    private static $middlewares = [];
    private $currentRoute = null;

    public static function get($path, $callback)
    {
        self::$routes['GET'][$path] = $callback;
    }

    public static function post($path, $callback)
    {
        self::$routes['POST'][$path] = $callback;
    }

    public static function put($path, $callback)
    {
        self::$routes['PUT'][$path] = $callback;
    }

    public static function delete($path, $callback)
    {
        self::$routes['DELETE'][$path] = $callback;
    }

    public static function middleware($name, $callback)
    {
        self::$middlewares[$name] = $callback;
    }

    public function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $basePath = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
        
        if (strpos($path, $basePath) === 0) {
            $path = substr($path, strlen($basePath));
        }
        
        $path = '/' . ltrim($path, '/');
        $path = rtrim($path, '/') ?: '/';

        $params = [];
        $route = $this->matchRoute($method, $path, $params);

        if ($route) {
            $this->currentRoute = $route;
            
            if (is_array($route) && isset($route['middleware'])) {
                foreach ((array)$route['middleware'] as $middleware) {
                    if (isset(self::$middlewares[$middleware])) {
                        $result = call_user_func(self::$middlewares[$middleware]);
                        if ($result === false) {
                            http_response_code(403);
                            echo json_encode(['error' => 'Unauthorized']);
                            exit;
                        }
                    }
                }
            }

            $callback = is_array($route) ? $route['callback'] : $route;
            
            if (is_string($callback) && strpos($callback, '@') !== false) {
                list($controller, $method) = explode('@', $callback);
                $controllerClass = 'App\\Controllers\\' . str_replace('/', '\\', $controller);
                
                if (class_exists($controllerClass)) {
                    $instance = new $controllerClass();
                    call_user_func_array([$instance, $method], array_values($params));
                } else {
                    http_response_code(404);
                    echo json_encode(['error' => 'Controller not found']);
                }
            } else {
                call_user_func_array($callback, array_values($params));
            }
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Route not found']);
        }
    }

    private function matchRoute($method, $path, &$params)
    {
        if (!isset(self::$routes[$method])) {
            return null;
        }

        foreach (self::$routes[$method] as $route => $callback) {
            if ($route === $path) {
                return $callback;
            }

            $pattern = preg_replace_callback('/\{([a-zA-Z_][a-zA-Z0-9_]*)\}/', function($matches) {
                return '(?P<' . $matches[1] . '>[^/]+)';
            }, $route);

            if (preg_match('#^' . $pattern . '$#', $path, $matches)) {
                foreach ($matches as $key => $value) {
                    if (!is_numeric($key)) {
                        $params[$key] = $value;
                    }
                }
                return $callback;
            }
        }

        return null;
    }
}
