<div class="container">
    <h1>Создание новой задачи</h1>
    <form action="/index.php?route=task/add"
          method="post"
          enctype="multipart/form-data">


        <div class="form-group">
            <label for="username">Пользователь:</label>
            <input id="username" type="text" name="username" class="form-control" required/>
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input id="email" type="email" name="email" class="form-control" required/>
        </div>

        <div class="form-group">
            <label for="image">Изображение:</label>
            <input id="image" type="file" name="image" class="form-control-file"/>
        </div>

        <div class="form-group">
            <label>Контент:</label>
            <textarea name="content" required class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Создать задачу</button>
    </form>
</div>
