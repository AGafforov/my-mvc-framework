<?php
/** @var $tasks [] */
/** @var $prevPage mixed */
/** @var $nextPage mixed */
/** @var $currentPage integer */

$isLogin = \app\libraries\App::getSession()->get("isLogin");
?>

<a href="/index.php?route=task/add" class="btn btn-primary" role="button">Добавить новую задачу</a>

<h1>Список задач</h1>


<?php if (count($tasks)) : ?>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Email</th>
            <th>Контент</th>
            <th>Выполнено</th>
            <?= $isLogin ? "<th>Редактировать</th>" : "" ?>
        </tr>
        <?php foreach ($tasks as $task) : ?>
            <tr>
                <td><?= $task['id'] ?></td>
                <td><?= $task['username'] ?></td>
                <td><?= $task['email'] ?></td>
                <td><?= $task['content'] ?></td>
                <td><?= $task['status'] == 1 ? 'да' : 'нет'; ?></td>
                <?= $isLogin ? "<th><a href='index.php?route=task/edit&id=" . $task['id'] . "' >Изменить</a></th>" : "" ?>
            </tr>
        <?php endforeach; ?>
    </table>

    <ul class="pagination">
        <li>
            <a href="<?= $prevPage === '#' ? $prevPage : "/index.php?route=task/index&page=$prevPage" ?>">
                Пред.
            </a>
        </li>
        <li class="active">
            <a href="/index.php?route=task/index&page=<?= $currentPage ?>">
                <?= $currentPage ?>
            </a>
        </li>
        <li>
            <a href="<?= $nextPage === '#' ? $nextPage : "/index.php?route=task/index&page=$nextPage" ?>">
                След.
            </a>
        </li>
    </ul>
<?php else: ?>
    <h1>Задач не найдено.</h1>
<?php endif; ?>
