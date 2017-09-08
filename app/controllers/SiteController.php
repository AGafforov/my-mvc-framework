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
    public function actionLogIn()
    {
        $post = App::getRequest()->post();

        if (($post['login'] ?? '') === "admin" && ($post['password'] ?? '') === "123") {
        }
    }

    public function actionLogOut()
    {
    }
}
