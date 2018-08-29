<?php
ob_start();
require_once 'autoload/Autoload.php';

if (Input::method()) {
    $user = new login();
    $user->selectUsers();
}
ob_end_flush();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png"/>
    <link rel="icon" type="image/png" href="assets/img/devLogo.png"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>devLuk Technologies: Login Panel</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="import" href="https://www.polymer-project.org/0.5/components/paper-ripple/paper-ripple.html">
    <link href="css/login.css" rel="stylesheet" type="text/css"/>

</head>
<body>

<div class="container">
    <div class="profile">
        <button class="profile__avatar" id="toggleProfile">
            <img src="assets/img/logo.png" alt="devLuk Technologies"/>
        </button>
        <div class="profile__form">
            <div class="profile__fields">
                <form method="post">
                    <div class="field">
                        <input type="text" id="fieldUser" placeholder="Username" name="txtuser" class="input" required
                               >
                    </div>
                    <div class="field">
                        <input type="password" id="fieldPassword" placeholder="Password" name="txtpwd" class="input"
                               required >
                    </div>
                    <div class="profile__footer">
                        <input type="submit" value="Login" name="btnLogin" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="js/login.js" type="text/javascript"></script>
</body>
</html>
