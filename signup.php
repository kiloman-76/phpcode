<?php
    require "db.php";
    include("header.php");
    $data = $_POST;
    $success = false;
    if (isset($data['do_signup']))
    {
        $errors = array();
        foreach($data as $dat){
            var_dump($dat);
        }
        if(trim($data['login']) == ''){
            $errors[] = "Введите логин";
        };

        if(trim($data['email']) == ''){
            $errors[] = "Введите почтовый адрес";
        };

        if($data['password'] == ''){
            $errors[] = "Введите пароль";
        };

        if($data['password_2'] != $data['password']){
            $errors[] = "Повторный пароль введен неверно";
        }

        if( R::count('users', 'login = ?', array(
                $data['login'])) > 0){
            $errors[] = "Пользователь с таким логином уже зарегисрирован";
        };

        if( R::count('users', 'email = ?', array($data['email'])) > 0){
            $errors[] = "Пользователь с таким Email уже зарегисрирован";
        };


        if( empty($errors) ){
            $user = R::dispense('users');
            $user->login = $data['login'];
            $user->email = $data['email'];
            $user->password =  password_hash($data['password'],PASSWORD_DEFAULT);
            $user->join_date = time();
            R::store($user);
            $success = true;
        }
    };

?>
<div class="container form-block">
    <?php if($success) : ?>
        <div style = "color:green">Вы успешно авторизованы! Теперь вы можете <a href="/login.php">войти</a>, используя ваш логин и пароль</div>
    <?php else : ?>
        <h2>Регистрация</h2>
        <span>Пожалуйста, заполните поля ниже </span>
        <div class="row">
            <div class="col-lg-5">
                <form action="signup.php" method="POST">

                    <?php if( !empty($errors) ) : ?>
                        <div style = "color:red"> <?= array_shift($errors) ?></div>
                    <?php endif; ?>

                    <p>
                    <p><label for="login"><b>Ваш логин</b>:</label></p>
                    <input type="text" class="form-control" id="login" name="login" value="<?php echo @$data['login']?>">
                    </p>

                    <p>
                    <p><label for="email"><b>Ваш Email</b>:</label></p>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo @$data['email']?>">
                    </p>

                    <p>
                    <p><label for="password"><b>Ваш пароль</b>:</label></p>
                    <input type="password" class="form-control" name="password" id="password" value="<?php echo @$data['password']?>">
                    </p>

                    <p>
                    <p><label for="password_2"><b>Введите ваш пароль еще раз</b>:</label></p>
                    <input type="password" class="form-control" name="password_2" id="password_2" value="<?php echo @$data['password_2']?>">
                    </p>

                    <p>
                        <button type="submit" class="btn btn-primary" name="do_signup">Зарегистрироваться</button>
                    </p>
                </form>
            </div>
        </div>
    <?php endif; ?>
</div>

