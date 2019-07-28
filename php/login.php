<?php
require_once ('../inc/User.php');

if (isset($_POST['userName']) && isset($_POST['password'])){
    $user = User::create($_POST['userName'], $_POST['password']);

    if ($user){
        header('Location: /home.php');
    }
}
