<?php
    function prepareInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    class Person {
        public $login;
        public $password;
        public $fullName;
        }

        $person1 = new Person;
        $person1->login = "adam";
        $person1->password = "adam2020";
        $person1->fullName = "Adam Kowalski";
        $person2 = new Person;
        $person2->login = "agata";
        $person2->password = "2020agata";
        $person2->fullName = "Agata Nowak";
?>