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
        
        if (!isLogged()) {
            header("Location: myIndex.php");
        }

        //content
        showUser();
        echo "<br><br>";
        logOutButton();
        echo "<br><br>";
        showImage();
        echo "<br><br>";
        inputFile();
        
        if (isSet($_POST['fileUpload'])) {
            
            uploadFile();
        }
        

        function isLogged() {
            if ($_SESSION["logged"]) {
                return true;
            }
            return false;
        }

        function showUser() {
            $loggedUser = $_SESSION["loggedUser"];
        echo "Jestes zalogowany jako: $loggedUser  ";
        }

        function logOutButton() {
            echo "<form action='myIndex.php' method='POST'>
            <input type='submit' name='logOut' value = 'Wyloguj'>
        </form>";
        }

        function inputFile() {
            echo "Wybierajac plik, wyswietlisz go na ekranie<br><br>";
            echo "
            <form action = 'user.php' method='POST' enctype='multipart/form-data'>
                <input name='file' type='file'><br><br>
                <input name='fileUpload' type='submit'><br>
            </form>";
            //uploadFile();
        }

        function uploadFile() {
            $currentDir = getcwd();
            $uploadDir = "imagesFromUsers";
            $fileName = $_FILES['file']['name'];
            $fileSize = $_FILES['file']['size'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileType = $_FILES['file']['type'];
            if($fileName != "" and (
                $fileType == 'image/png' or $fileType == 'image/jpeg' or
                $fileType == 'image/JPEG' or $fileType == 'image/PNG'
            )) {
                $uploadPath = $currentDir . "/" .$uploadDir . "/" . $fileName;
                if (move_uploaded_file($fileTmpName, $uploadPath)) {
                    echo "<br>Zdjecie zostalo zaladowane na serwer FTP<br>";
                } else {
                    echo "Ups, cos poszlo nie tak<br>";
                }
            } else {
                echo "Niepoprawny format pliku. Wymagany format: png/PNG/jpeg/JPEG<br>";
            }
            //showImage();
        }

        function showImage() {
            $files = scandir('imagesFromUsers');
            foreach($files as $file) {
                if ($file !=="." and $file !=="..") {
                    echo "<img src='imagesFromUsers/$file' width = 300px height = 300px/>";
                }
            }
            if (count(scandir('imagesFromUsers')) == 2) {
                echo "<br>Brak plikow na serwerze<br>";
            }
        }
    ?>
</body