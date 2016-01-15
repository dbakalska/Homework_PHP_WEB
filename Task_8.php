<?php
/* Задача 8: Създайте HTML страница с PHP скрипт, в който съдържа HTML форма и
показва на екрана колко пъти тази форма е била изпратена на
сървъра. */

session_start();

isset($_SESSION['counter']) ? $_SESSION['counter']++ : $_SESSION['counter'] = 0;

if(isset($_POST['reset'])) {
    $_SESSION['counter'] = 0;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Task 8</title>
    <style type="text/css">
        #submit {
            margin-left: 80px;
        }
    </style>
</head>
<body>
<form method="POST">
    <div>
        <label for="">Username</label>
        <input type="text">
    </div><br>
    <div>
        <label for="">Password</label>
        <input type="password">
    </div><br>
    <input type="hidden" name="counter" value="<?= $_SESSION['counter']; ?>" >
    <input type="submit" id="submit" name="button" >
    <input type="submit" name="reset" value="Reset" >
    <p>You submitted the form <?= $_SESSION['counter']; ?> times</p>
</form>
</body>
</html>