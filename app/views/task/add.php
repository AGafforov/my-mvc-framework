<h1>Создание новой задачи</h1>
<form action="/index.php?route=task/add"
      method="post"
      enctype="multipart/form-data">

    Username: <input type="text" name="username" required/><br>

    Email: <input type="email" name="email"/><br>

    Image: <input type="file" name="image" id="image"/><br/>

    Content: <textarea name="content"></textarea><br>

    <button type="submit">Создать задачу</button>
</form>
