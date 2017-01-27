<?php
    require "db.php";

    $data = $_POST;
    $success = false;
    if (isset($data['do_login']))
    {
        $errors = array();
        $user = R::findOne('users', 'login = ?', array($data['login']));
        if($user){
            if(password_verify($data['password'], $user->password)){
                $_SESSION['logged_user'] = $user;
                $success = true;
            } else {
                $errors[] = 'Неверно введен пароль';
            }
        } else {
            $errors[] = 'Пользователь с таким логином не найден';
        }

    }
include("header.php");
?>
<div class="container form-block">
    <?php if($success) : ?>
        <div style = "color:green">Вы успешно авторизованы! Можете перейти на <a href="/">главную</a> страницу</div>
    <?php else : ?>
    <h2>Авторизация</h2>
    <span>Для того чтобы выполнить вход, пожалуйста введите свой логин и пароль</span>
    <div class="row">
        <div class="col-lg-5">
                <form action="login.php" method="POST">
                    <?php if( !empty($errors) ) : ?>
                        <div style = "color:red"> <?= array_shift($errors) ?></div>
                    <?php endif; ?>

                    <p>
                    <p><label for="login"><b>Ваш логин</b>:</label></p>
                    <input type="text" class="form-control" id="login" name="login" value="<?php echo @$data['login']?>">
                    </p>

                    <p>
                    <p><label for="password"><b>Ваш пароль</b>:</label></p>
                    <input type="password" class="form-control" name="password" id="password" value="<?php echo @$data['password']?>">
                    </p>

                    <p>
                        <button type="submit" class="btn btn-primary" name="do_login">Войти</button>
                    </p>

                </form>
        </div>
    </div>
    <?php endif; ?>
</div>


