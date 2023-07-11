<?php

if(isset($_POST['submit'])){

    // grabbing data
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdrepeat = $_POST['pwdrepeat'];
    $email = $_POST['email'];

    // instantiate signup class
    include_once "../classes/dbh.php";
    include_once "../classes/signup.class.php";
    include_once "../classes/signupcontr.php";
    $signup = new SignupContr($uid, $pwd, $pwdrepeat, $email);

    // running try catch error
    $signup->signupUser();

    // back to the front page
    header('location: ../index.php?error=none');
}