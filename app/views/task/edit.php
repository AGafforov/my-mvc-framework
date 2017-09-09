<?php
/** @var $task [] */
?>

<form action="/index.php?route=task/edit" method="post">

    <input type="hidden"
           name="id"
           value="<?= $task['id'] ?? '' ?>"/><br>

    Пользователь: <?= $task['username'] ?? '' ?><br>
    Email: <?= $task['email'] ?? '' ?><br>
    Изображение: <img src="<?= $task['image'] ?>" alt="Image"/><br>

    <textarea name="content">
              <?= $task['content'] ?? '' ?>
    </textarea><br>

    <input type="checkbox"
           name="status" <?= ($task['status'] ?? '') == 1 ? "checked" : "" ?>/><br>

    <button type="submit">Изменить задачу</button>
</form>
