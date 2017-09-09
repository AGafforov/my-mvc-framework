<?php
/** @var $task [] */
?>
<div class="container">
    <form action="/index.php?route=task/edit" method="post">
        <input type="hidden" name="id" value="<?= $task['id'] ?? '' ?>"/>

        <div class="form-group">
            <img src="<?= $task['image'] ?? '' ?>" alt="Image" title="Изображение"/>
        </div>

        <div class="form-group">
            <label for="email">Пользователь: <?= $task['username'] ?? '' ?></label>
        </div>

        <div class="form-group">
            <label for="email">Email: <?= $task['email'] ?? '' ?></label>
        </div>

        <div class="form-group">
            <label for="email">Контент:</label>
            <textarea name="content" id="content" title="Контент"
                      class="form-control"><?= $task['content'] ?? '' ?></textarea>
        </div>


        <div class="checkbox">
            <label for="status">
                <input id="status"
                       type="checkbox"
                       name="status"
                    <?= ($task['status'] ?? '') == 1 ? "checked" : "" ?>>
                Выполнено
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Изменить задачу</button>
    </form>
</div>
