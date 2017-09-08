<?php
/** @var $tasks [] */
/** @var $prevPage mixed */
/** @var $nextPage mixed */
/** @var $currentPage integer */

$isLogin = \app\libraries\App::getSession()->get("isLogin");
?>

<?php if ($isLogin) : ?>
    <a href="#">Админ</a>
    <a href="index.php?route=site/log-out">Выход</a>
<?php else: ?>
    <a href="index.php?route=site/log-in">Вход</a>
<?php endif; ?>


<?php if (count($tasks)) : ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Email</th>
            <th>Контент</th>
        </tr>
        <?php foreach ($tasks as $task) : ?>
            <tr>
                <td><?= $task['id'] ?></td>
                <td><?= $task['username'] ?></td>
                <td><?= $task['email'] ?></td>
                <td><?= $task['content'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div>
        <a href="<?= $prevPage === '#' ? $prevPage : "/index.php?route=task/index&page=$prevPage" ?>">Пред.</a>
        <a href="/index.php?route=task/index&page=<?= $currentPage ?>"><?= $currentPage ?></a>
        <a href="<?= $nextPage === '#' ? $nextPage : "/index.php?route=task/index&page=$nextPage" ?>">След.</a>
    </div>
<?php else: ?>
    <h1>Задач не найдено.</h1>
<?php endif; ?>

<a href="/index.php?route=task/add">Добавить задачу</a>


