<?php
require "libs/rb.php";
R::setup( 'mysql:host=localhost;dbname=task_php',
    'admin', 'admin' ); //for both mysql or mariaDB

session_start();