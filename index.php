<?php
require "db.php";
include("header.php");
?>
<?php if(isset($_SESSION['logged_user'])) : ?>
    <div class="container">
        <div class="jumbotron">
            <h2>Добро пожаловать, <?= $_SESSION['logged_user']->login ?></h2>
            <hr>
            <a class="btn btn-lg btn-danger " href="logout.php">Выйти</a>
        </div>
    </div>

<?php else : ?>
    <div class="container">
        <div class="jumbotron">
            <h1 class="main-header">Добро пожаловать!</h1>
            <p class="lead">Пожалуйста войдите или зарегистрируйтесь</p>
            <a class="btn btn-lg btn-success" href="login.php">Войти</a>
            <a class="btn btn-lg btn-success" href="signup.php">Зарегистрироваться</a></p>
        </div>
    </div>
<?php endif; ?>