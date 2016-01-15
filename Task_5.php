<?php
/* Задача 5: Създайте HTML страница с PHP скрипт, в който изписва всички REQUEST
параметри (POST и GET ). Да изписва техните имена и стойности, както и да показва от
какъв тип са тези параметри (int, string, ...).*/

require_once 'functions.php';

//$firstName = getValue($_GET, 'first_name');
//$lastName = getValue($_GET, 'last_name');
//$age = getValue($_GET, 'age');
//$username = getValue($_POST, 'username');
//$password = getValue($_POST, 'password');

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Task 5</title>
        <style type="text/css">
            form label:first-child {
                width: 100px;
                display: inline-block;
            }
        </style>
    </head>
    <body>
        <form action="" method="get">
            <div>
                <label for="first-name">First Name</label>
                <input type="text" id="first-name" name="first_name">
            </div>
            <br>
            <div>
                <label for="last-name">Last Name</label>
                <input type="text" id="last-name" name="last_name">
            </div>
            <br>
            <div>
                <label for="age">Age</label>
                <input type="number" id="age" name="age">
            </div><br>
            <input type="submit"><br><br>
        </form>
        <form action="" method="get">
            <div>
                <label for="username">User Name</label>
                <input type="text" name="username" id="username" />
            </div><br>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" />
            </div><br>
            <input type="submit">
        </form>
    <?php
        if (!empty($_REQUEST)) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                var_dump($_POST);
            } else if ($_SERVER["REQUEST_METHOD"] == "GET") {
                var_dump($_GET);
            }
        }
    ?>
    </body>
</html>
