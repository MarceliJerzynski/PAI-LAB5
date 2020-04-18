<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
    <meta charset='UTF-8' />
</head>
<body>
    <?php
        require("lib.php");

        if ( isSet($_POST["loginForm"])) {
            $login = prepareInput($_POST['login']);
            $password = prepareInput($_POST['password']);
            //echo "Przeslany login: $login<br>";
            //echo "Przeslane haslo: $password<br>";
            if ($login == $person1->login and $password == $person1->password) {
                    $_SESSION["loggedUser"] = $person1->fullName;
                    $_SESSION["logged"] = true;
            } else
            if ($login == $person2->login and $password == $person2->password) {
                $_SESSION["loggedUser"] = $person2->fullName;
                $_SESSION["logged"] = true;
            } else {
                $_SESSION["logged"] = false;
                header("Location: myIndex.php");
            }

            if ($_SESSION["logged"]) {
                header("Location: user.php");
            }
        }
    ?>
</body