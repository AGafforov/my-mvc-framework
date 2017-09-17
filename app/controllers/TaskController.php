<?php
namespace app\controllers;

use app\models\Task;
use app\libraries\App;
use app\helpers\ImageHelper;
use app\libraries\Controller;
use app\widgets\Alert;

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
        $model = new Task();

        $sort      = App::getRequest()->get('sort', 'ASC');
        $sortField = App::getRequest()->get('sortField', 'id');

        $offset = App::getRequest()->get('page', 1);

        $tasks      = $model->select('*', $sortField, $sort, ($offset - 1));
        $tasksCount = $model->count();

        $nextPage = (($offset + 1) <= ceil($tasksCount / 3)) ? $offset + 1 : '#';
        $prevPage = $offset > 1 ? $offset - 1 : '#';

        return $this->render('index', [
            'tasks'       => $tasks,
            'sort'        => $sort,
            'sortField'   => $sortField,
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
            $post['image'] = ImageHelper::uploadImage($_FILES['image']);

            $model = new Task();
            if ($model->insert($post)) {
                Alert::add(Alert::TYPE_SUCCESS, "Новая задача успешно добавлена.");
            } else {
                Alert::add(Alert::TYPE_DANGER, "Не удалось добавить новую задачу.");
            }

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
            if ($model->update($post, ['id' => App::getRequest()->post('id')])) {
                Alert::add(Alert::TYPE_SUCCESS, "Задача успешно обновлена.");
            } else {
                Alert::add(Alert::TYPE_DANGER, "Не удалось отредактировать запись.");
            }

            return App::getRouter()->to('task');
        }

        $id   = App::getRequest()->get('id');
        $task = (new  Task())->selectOne($id);

        return $this->render('edit', ['task' => $task]);
    }
}
