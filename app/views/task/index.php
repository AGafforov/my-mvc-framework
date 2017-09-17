<?php
/** @var $tasks [] */
/** @var $prevPage mixed */
/** @var $nextPage mixed */
/** @var $currentPage integer */
/** @var $sort string */
/** @var $sortField string */

$sort        = $sort === 'ASC' ? 'DESC' : 'ASC';
$isLogin     = \app\libraries\App::getSession()->get("isLogin");
$currentLink = "index.php?route=task/index&page=$currentPage";
?>

<a href="/index.php?route=task/add" class="btn btn-primary" role="button">Добавить новую задачу</a>

<h1>Список задач</h1>


<?php if (count($tasks)) : ?>
    <table class="table table-striped">
        <tr>
            <th>
                <a href="<?= $currentLink ?>&sortField=id&sort=<?= $sort ?>">ID</a>
                <?= $sortField === 'id' ? '<i class="fa fa-fw fa-sort">' : ""; ?>
            </th>
            <th>
                <a href="<?= $currentLink ?>&sortField=username&sort=<?= $sort; ?>">Имя</a>
                <?= $sortField === 'username' ? '<i class="fa fa-fw fa-sort">' : ""; ?>
            </th>
            <th>
                <a href="<?= $currentLink ?>&sortField=email&sort=<?= $sort; ?>">Email</a>
                <?= $sortField === 'email' ? '<i class="fa fa-fw fa-sort">' : ""; ?>
            </th>
            <th>
                <a href="<?= $currentLink ?>&sortField=content&sort=<?= $sort; ?>">Контент</a>
                <?= $sortField === 'content' ? '<i class="fa fa-fw fa-sort">' : ""; ?>
            </th>
            <th>
                <a href="<?= $currentLink ?>&sortField=status&sort=<?= $sort; ?>">Выполнено</a>
                <?= $sortField === 'status' ? '<i class="fa fa-fw fa-sort">' : ""; ?>
            </th>
            <th>
                <a href="#">Картинка</a>
            </th>
            <?= $isLogin ? "<th>Редактировать</th>" : "" ?>
        </tr>
        <?php foreach ($tasks as $task) : ?>
            <tr>
                <td><?= $task['id'] ?></td>
                <td><?= $task['username'] ?></td>
                <td><?= $task['email'] ?></td>
                <td><?= $task['content'] ?></td>
                <td><?= $task['status'] == 1 ? 'да' : 'нет'; ?></td>
                <td>
                    <?php if ($task['image'] ?? null) : ?>
                        <a href="#"
                           data-toggle="modal"
                           data-target="#pic-<?= $task['id'] ?>">
                            Показать картинку
                        </a>

                        <div id="pic-<?= $task['id'] ?>"
                             class="modal fade"
                             tabindex="-1"
                             role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body" style="text-align: center;">
                                        <img src="<?= $task['image'] ?>" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <p>нет</p>
                    <?php endif; ?>
                </td>
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
