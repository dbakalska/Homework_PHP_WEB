<?php
/* Задача 9: Създайте 2 PHP страници, които си предават 5 параметъра от едната
към другата. Изпишете тези параметри. Предайте тези параметри по 2 начина - чрез POST и GET заявки.*/

require_once '../functions.php';

$firstName = getValue($_POST, 'first_name');
$lastName = getValue($_POST, 'last_name');
$age = getValue($_POST, 'age');
$username = getValue($_POST, 'username');
$password = getValue($_POST, 'password');

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Task 9 - get</title>
        <style type="text/css">
            form label:first-child {
                width: 100px;
                display: inline-block;
            }
        </style>
    </head>
    <body>
    <form action="post.php" method="get">
        <h3>Form with method GET</h3>
        <div>
            <label for="first-name">First Name</label>
            <input type="text" id="first-name" name="first_name">
        </div><br>
        <div>
            <label for="last-name">Last Name</label>
            <input type="text" id="last-name" name="last_name">
        </div><br>
        <div>
            <label for="age">Age</label>
            <input type="number" id="age" name="age">
        </div><br>
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
    <?php if (!empty($_POST)) :
        foreach ($_POST as $label => $input) : ?>
            <p><?= $label?> : <?= $input ?></p>
        <?php endforeach; endif; ?>
    </body>
</html>