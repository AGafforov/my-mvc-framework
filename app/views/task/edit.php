<?php
/** @var $task [] */
?>

<form action="/index.php?route=task/edit" method="post">
    <input type="hidden"
           name="id"
           value="<?= $task['id'] ?? '' ?>"
           required/><br>

    <input type="text"
           name="username"
           value="<?= $task['username'] ?? '' ?>"
           required/><br>

    <input type="email"
           name="email"
           value="<?= $task['email'] ?? '' ?>"
           required/><br>

    <textarea name="content"
              value="<?= $task['content'] ?? '' ?>"
              required><?= $task['content'] ?? '' ?></textarea><br>
    <button type="submit">Изменить задачу</button>
</form>
