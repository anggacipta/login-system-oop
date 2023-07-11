<?php

if(isset($_POST['submit'])){

    // grabbing data
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    // instantiate signup class
    include_once "../classes/dbh.php";
    include_once "../classes/login.php";
    include_once "../classes/login-contr.php";
    $login = new LoginContr($uid, $pwd);

    // running try catch error
    $login->loginUser();

    // back to the front page
    header('location: ../index.php?error=none');
}