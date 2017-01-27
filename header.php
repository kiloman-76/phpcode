<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> Образец кода на примере регистрации </title>
    <link href="css/bootstrap.css" media="screen" rel="stylesheet">
</head>
<body>
    <nav class="navbar-inverse navbar-fixed-top navbar" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <span class="navbar-brand" href="../../backend/web/index.php">Тестовое приложение</span>
            </div>
            <div class="collapse navbar-collapse">
                <?php if(isset($_SESSION['logged_user'])) : ?>
                    <ul id="w1" class="navbar-nav navbar-right nav">
                        <li><a href="logout.php">Выйти</a></li>
                    </ul>

                <?php else : ?>
                    <ul id="w1" class="navbar-nav navbar-right nav">
                        <li><a href="/">Главная</a></li>
                        <li><a href="signup.php">Регистрация</a></li>
                        <li><a href="login.php">Войти</a></li>
                    </ul>
                <?php endif; ?>

            </div>
        </div>
    </nav>




