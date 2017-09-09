<?php

/** @var $content string */

$isLogin = \app\libraries\App::getSession()->get("isLogin");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/content/css/main.css">
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">BeeJee - тестовое задание</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="/index.php">Главная</a></li>
            <?php if ($isLogin) : ?>
                <li><a href="#">Админ</a></li>
            <?php endif; ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php if ($isLogin) : ?>
                <li>
                    <a href="index.php?route=site/log-out">
                        <span class="glyphicon glyphicon-log-out"></span>
                        LogOut
                    </a>
                </li>
            <?php else: ?>
                <li>
                    <a href="index.php?route=site/log-in">
                        <span class="glyphicon glyphicon-log-in"></span>
                        LogIn
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <?= $content; ?>
</div>

</body>
</html>
