<?php session_start(); ?>
<!DOCTYPE html>
<?php
require("lib.php");
if(isSet($_GET['cookieForm'])) {
            $time = prepareInput($_GET['time']);

            setcookie("COOKIE", "ciastko z czekolada", time() + $time, "/");

            echo "Ciasteczka zostaly pomyslnie utworzone<br><br>";
        }
?>
<html>
<head>
    <title>PHP</title>
    <meta charset='UTF-8' />
</head>
<body>
    <?php
        //require("lib.php");

        // if(isSet($_GET['cookieForm'])) {
        //     $time = prepareInput($_GET['time']);

        //     setcookie("COOKIES", "LOVE", time() + $time, "/");
        //     echo "Ciasteczka zostaly pomyslnie utworzone<br>";
        // }
        echo "<br>";
        logOutButton();

        function logOutButton() {
            echo "<form action='myIndex.php' method='POST'>
            <input type='submit' name='logOut' value = 'Wroc'>
        </form>";
        }
    ?>
</body