<div class="container">
    <h1>Вход в систему</h1>
    <form action="/index.php?route=site/log-in" method="post">
        <div class="form-group">
            <label for="login">Логин:</label>
            <input id="login" type="text" name="login" class="form-control" required/>
        </div>

        <div class="form-group">
            <label for="password">Пароль:</label>
            <input id="password" type="password" name="password" class="form-control" required/>
        </div>

        <button type="submit" class="btn btn-primary">Войти</button>
    </form>
</div>
