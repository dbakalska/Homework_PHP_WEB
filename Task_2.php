<?php
/* Задача 2: Създайте HTML страница с PHP скрипт, в който потребителя трябва да въведе username
и 2 пароли. Проверете дали двете пароли съвпадат и след това ги криптирайте.
Изпишете след това username и криптираната парола. Направете всички възможни проверки за въведените стойности.*/

require_once 'functions.php';

$validationErrors  = [];
$username = getValue($_POST, 'username');
$password = getValue($_POST, 'password');
$confirm_password = getValue($_POST, 'confirm_password');

function validateForm(&$errors) {
    global $username, $password, $confirm_password;

    $errors = [];

    if (!validateRequired($username)) {
        $errors['username'][] = 'Username is required';
    } else if(!validateLongerOrEqualString($username, 4)) {
        $errors['username'][] = 'Username must be at least 4 characters long';
    }

    if (!validateRequired($password)) {
        $errors['password'][] = 'Password is required';
    } else if(!validateLongerOrEqualString($password, 5)) {
            $errors['password'][] = 'Password must be at least 5 characters long';
    } else if (!validateNonAlphaNumeric($password)) {
            $errors['password'][] = 'Password must contain at least 1 non alphanumeric character';
    }
    
    if ($confirm_password !== $password) {
        $errors['confirm_password'][] = 'Password and Confirm Password doesn\'t match';

    }
    return empty($errors);
}

function getFieldClass($errors, $field) {
    return !empty($errors[$field]) ? 'error' : '';
}

if (!empty($_POST)) {
    validateForm($validationErrors);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Task 2</title>
        <style type="text/css">
            body {
                margin-left: 10%;
            }
            form label {
                width: 130px;
                display: inline-block;
                padding: 0.5em 0 0 0;
            }
            .error {
				color: red;
			}
			.error p {
				padding-left: 135px;
			}
            #submit-btn {
                margin: 10px 0 0 190px;
            }
        </style>
    </head>
    <body>
        <h4>Account Maintenance - Change your password and get <em>encrypted</em> one</h4>
        <div>
            <form action="" method="post">
                <div class="<?= getFieldClass($validationErrors, 'username')?>">
                    <label for="username">User Name</label>
                    <input type="text" name="username" id="username" value="<?= htmlentities($username)?>"/>
                    <?= displayErrors($validationErrors, 'username')?>
                </div>
                <div class="<?= getFieldClass($validationErrors, 'password')?>">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" />
                    <?= displayErrors($validationErrors, 'password')?>
                </div>
                <div class="<?= getFieldClass($validationErrors, 'confirm_password')?>">
                    <label for="password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" />
                    <?= displayErrors($validationErrors, 'confirm_password')?>
                </div>
                <div>
                    <input type="submit" id="submit-btn"/>
                </div>
            </form>
        </div>
        <?php if(empty($errors)) :?>
        	<p>Your username is <?= $username . ' and your password is ' . md5($password)?></p>
        <?php endif;?>
    </body>
</html>
