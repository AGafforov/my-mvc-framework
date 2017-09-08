<?php
namespace app\controllers;

use app\libraries\App;
use app\libraries\Controller;
use app\models\Task;

/**
 * Class TaskController
 *
 * @package app\controllers
 */
class TaskController extends Controller
{
    /**
     * @return bool
     */
    public function actionIndex()
    {
        $model  = new Task();
        $offset = App::getRequest()->get('page', 1);

        $tasks      = $model->select('*', ($offset - 1));
        $tasksCount = $model->count();

        $nextPage = (($offset + 1) <= ceil($tasksCount / 3)) ? $offset + 1 : '#';
        $prevPage = $offset > 1 ? $offset - 1 : '#';

        return $this->render('index', [
            'tasks'       => $tasks,
            'prevPage'    => $prevPage,
            'nextPage'    => $nextPage,
            'currentPage' => $offset,
        ]);
    }

    /**
     * @return bool|mixed
     */
    public function actionAdd()
    {
        $post = App::getRequest()->post();
        if ($post) {
            $model = new Task();
            $model->insert($post);

            return App::getRouter()->route('task');
        }

        return $this->render('add');
    }
}
