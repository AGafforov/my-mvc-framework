<h1>Создание новой задачи</h1>
<form action="/index.php?route=task/add" method="post">
    <input type="text" name="username" required/><br>
    <input type="email" name="email" required/><br>
    <textarea name="content" required></textarea><br>
    <button type="submit">Создать задачу</button>
</form>
