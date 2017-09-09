<?php
namespace app\controllers;

use app\models\Task;
use app\libraries\App;
use app\libraries\Controller;

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

            return App::getRouter()->to('task');
        }

        return $this->render('add');
    }

    /**
     * @return mixed
     */
    public function actionEdit()
    {
        if (App::getRequest()->post()) {
            $post           = App::getRequest()->post();
            $post['status'] = ($post['status'] ?? '') === "on" ? 1 : 0;

            $model = new Task();
            $model->update(
                $post,
                ['id' => App::getRequest()->post('id')]
            );

            return App::getRouter()->to('task');
        }

        $id   = App::getRequest()->get('id');
        $task = (new  Task())->selectOne($id);

        return $this->render('edit', ['task' => $task]);
    }
}
