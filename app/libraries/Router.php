<?php

namespace app\libraries;

/**
 * Class Router
 *
 * @package app\libraries
 */
class Router
{
    const CONTROLLERS_PATH = "app\\controllers\\";

    private $route = [];

    /**
     * Router constructor.
     *
     * @param $request
     * @param $config
     */
    public function __construct($request, $config)
    {
        try {
            if (($request['route'] ?? '')) {
                $route = $request['route'];
            } else {
                $appConfig = $config['app'] ?? [];
                if (!($appConfig['defaultController'] ?? '')) {
                    throw new \Exception("Please, specify defaultController in app's config.");
                }

                $route = $appConfig['defaultController'];
            }

            $this->route = explode("/", $route);
        } catch (\Exception $ex) {
            echo $ex->getMessage() . "<br>";
            echo $ex->getTraceAsString();
        }
    }

    /**
     * Routes to given controller
     *
     * @return mixed
     */
    public function route()
    {
        $controllerName      = $this->route[0] ?? '';
        $controllerNamespace = $this->getControllerNamespace($controllerName);

        $actionName = $this->getActionName($this->route[1] ?? '');
        $controller = new $controllerNamespace;

        return call_user_func(array($controller, $actionName));
    }

    /**
     * Redirects to given controller's action
     *
     * @param        $controller
     * @param string $action
     */
    public function to($controller, $action = "index")
    {
        return header("Location: /index.php?route=$controller/$action");
    }

    /**
     * Returns full action name by short name
     *
     * @param $action
     *
     * @return string
     */
    private function getActionName($action)
    {
        if (!$action) {
            return "actionIndex";
        }

        $action = str_replace(' ', '', ucwords(str_replace('-', ' ', $action)));

        return "action" . $action;
    }

    /**
     * Returns controller namespace by class short name
     *
     * @param $className
     *
     * @return string
     */
    private function getControllerNamespace($className)
    {
        $controller = str_replace(' ', '', ucwords(str_replace('-', ' ', $className)));

        return self::CONTROLLERS_PATH . $controller . "Controller";
    }
}
