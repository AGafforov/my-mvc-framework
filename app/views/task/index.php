<?php
/** @var $tasks [] */
/** @var $prevPage mixed */
/** @var $nextPage mixed */
/** @var $currentPage integer */
?>

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

<?php endif; ?>

<a href="/index.php?route=task/add">Добавить задачу</a>


