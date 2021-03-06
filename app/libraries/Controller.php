<?php

namespace app\libraries;

/**
 * Class Controller
 *
 * @package app\libraries
 */
class Controller
{
    const VIEWS_PATH = "app\\views\\";

    const LAYOUT_URL = "app\\views\\layout\\main.php";

    /**
     *  Renders view
     *
     * @param $view
     * @param $params
     *
     * @return bool
     */
    public function render($view, $params = [])
    {
        $class    = $this->getCalledClassName(get_called_class());
        $viewPath = $this->getView($class, $view);

        echo $this->renderView($viewPath, $params);

        return true;
    }

    /**
     * @param $viewPath
     * @param $params
     *
     * @return string
     */
    private function renderView($viewPath, $params)
    {
        // renders view
        extract($params);
        ob_start();
        include $viewPath;
        $content = ob_get_clean();

        // renders layout
        extract(['content' => $content]);
        ob_start();
        include self::LAYOUT_URL;
        $renderedView = ob_get_clean();

        return $renderedView;
    }

    /**
     * Returns view path
     *
     * @param $controller
     * @param $view
     *
     * @return string
     */
    private function getView($controller, $view)
    {
        return self::VIEWS_PATH . "$controller\\$view.php";
    }

    /**
     * Returns called class name by namespace
     *
     * @param $classNamespace
     *
     * @return mixed
     */
    private function getCalledClassName($classNamespace)
    {
        $array     = explode("\\", $classNamespace);
        $className = end($array);
        $className = preg_replace('/(?<=\\w)(?=[A-Z])/', "-$1", $className);
        $className = str_replace("-Controller", "", $className);

        return strtolower($className);
    }
}
