<?php

namespace app\controllers;

use app\libraries\App;
use app\libraries\Controller;

/**
 * Class SiteController
 *
 * @package app\controllers
 */
class SiteController extends Controller
{
    /**
     * @return mixed
     */
    public function actionLogIn()
    {
        if (App::getSession()->get("isLogin")) {
            return App::getRouter()->to("task", "index");
        }

        if (App::getRequest()->post("login") === "admin" && App::getRequest()->post("password") === "123") {
            App::getSession()->set("isLogin", true);

            return App::getRouter()->to("task", "index");
        }

        return $this->render("log-in");
    }

    /**
     * @return mixed
     */
    public function actionLogOut()
    {
        if (App::getSession()->get("isLogin")) {
            App::getSession()->set("isLogin", false);
        }

        return App::getRouter()->to("task", "index");
    }
}
