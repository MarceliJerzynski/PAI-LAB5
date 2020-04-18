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

        echo "<h1>AUTORSKI SYSTEM MARCELEGO</h1>";

        // if ( isSet($_POST["loginForm"])) {
        //     $login = prepareInput($_POST['login']);
        //     $password = prepareInput($_POST['password']);
        //     //echo "Przeslany login: $login<br>";
        //     //echo "Przeslane haslo: $password<br>";
        //     if ($login == $person1->login and $password == $person1->password) {
        //             $_SESSION["loggedUser"] = $person1->fullName;
        //             $_SESSION["logged"] = true;
        //     } else
        //     if ($login == $person2->login and $password == $person2->password) {
        //         $_SESSION["loggedUser"] = $person2->fullName;
        //         $_SESSION["logged"] = true;
        //     } else {
        //         $_SESSION["logged"] = false;
        //         echo "Bledne dane!<br>";
        //     }

        //     if ($_SESSION["logged"]) {
        //         header("Location: user.php");
        //     }
        // }

        if (isSet($_POST["logOut"])) {
            echo "Zostales poprawnie wylogowany<br>";
            $_SESSION["logged"] = false;
            $_SESSION["loggedUser"] = null;
        }

        echo "<br>
        <form action='loginService.php' method='POST'>
        <fieldset>
        <legend>Panel logowania</legend>
            Login:<br>
            <input type='text' name='login' required><br>
            Password:<br>
            <input type='password' name='password' required><br>
            <br><input type='submit' name='loginForm'>
        </fieldset>
        </form>";

        // echo "<br>
        // $person1->fullName"

        echo "<br><br><br>";
        echo "
        <form action='user.php' method='POST'>
        <fieldset>
            <legend>Sprawdz czy mozesz sie zalogowac</legend>
            <input type='submit' name='illegalLogin' value = 'Zaloguj bez danych'>
        </fieldset>
        </form>";

        echo "<br><br>
        <form action='cookie.php' method='GET'>
        <fieldset>
        <legend>Cookies!</legend>
            Czas: <br>
            <input type='number' name='time'   value = 'czas' required> <br><br>
            <input type='submit' name='cookieForm' value = 'utworz ciasteczka'>
        </fieldset>
        </form>";

        if (isSet($_COOKIE['COOKIE'])) {
            echo "Mam cookie!<br>";
            echo "COOKIE: " . $_COOKIE['COOKIE'] . "<br>";
            echo "Wygasnie za: " . intval($_COOKIE['COOKIE']);
        }
    ?>

</body