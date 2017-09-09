<?php
/** @var $task [] */
?>

<form action="/index.php?route=task/edit" method="post">
    <input type="hidden"
           name="id"
           value="<?= $task['id'] ?? '' ?>"/><br>

    <input type="text"
           name="username"
           value="<?= $task['username'] ?? '' ?>"/><br>

    <input type="email"
           name="email"
           value="<?= $task['email'] ?? '' ?>"/><br>

    <textarea name="content"
              value="<?= $task['content'] ?? '' ?>">
              <?= $task['content'] ?? '' ?></textarea><br>

    <input type="checkbox"
           name="status" <?= ($task['status'] ?? '') == 1 ? "checked" : "" ?>/><br>

    <button type="submit">Изменить задачу</button>
</form>
