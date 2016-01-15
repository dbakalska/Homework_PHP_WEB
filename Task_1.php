<?php
/* Задача 1: Създайте HTML страница с PHP скрипт, в който потребителя трябва да въведе 2 числа и
да избере от лист каква операция иска да изпълни. След това изведете резултата от
неговия избор и въведени стойности. Възможни операции нека да бъдат +, - , *, /.
Направете всички възможни проверки за въведените стойности.*/

require_once 'functions.php';

$firstInput = getValue($_POST, 'firstInput');
$secondInput = getValue($_POST, 'secondInput');
$operation = getValue($_POST, 'operation');
$result = 0;
$validationErrors = [];

function calculate() {
    global $firstInput, $secondInput, $operation, $result, $validationErrors;

    if (!validateRequired($firstInput)) {
        $validationErrors['firstInput'][] = 'First number is required';
    } else if (preg_match('/[^0-9]/', $firstInput)) {
        $validationErrors['firstInput'][] = 'Please, enter numbers only';
    };

    if (!validateRequired($secondInput)) {
        $validationErrors['secondInput'][] = 'Second number is required';
    } else if (preg_match('/[^0-9]/', $secondInput)) {
        $validationErrors['secondInput'][] = 'Please, enter numbers only';
    } else if ($secondInput == 0 && $operation == '/') {
        $validationErrors['secondInput'][] = 'The divisor cannot be zero';
    };

    if (!validateRequired($operation)) {
        $validationErrors['operation'][] = 'Operation is required';
    }

    if ($operation == '+') {
        $result = $firstInput + $secondInput;
    } else if ($operation == '-') {
        $result = $firstInput - $secondInput;
    } else if ($operation == '*') {
        $result = $firstInput * $secondInput;
    } else if ($operation == '/') {
        $result = $firstInput / $secondInput;
    } else {
        $result = 100;
    }

    return ($result);
}

function getFieldClass($errors, $field) {
    return !empty($errors[$field]) ? 'error' : '';
}

if (!empty($_POST)) {
    calculate();

}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Task 1</title>
        <style type="text/css">
            form label {
                width: 130px;
                display: inline-block;
            }
            p, form > div {
                padding: 0.5em 0 0 0.5em;
            }
            .error {
                color: red;
            }
            .error p {
                padding-left: 135px;
            }
        </style>
    </head>
    <body>
        <p>Please, enter two numbers and choose operation:</p>
        <div id="form">
            <form action="" method="post">
                <div class="<?= getFieldClass($validationErrors, 'firstInput')?>">
                    <label for="firstInput">First Number</label>
                    <input type="text" name="firstInput" id="firstInput" value="<?= htmlentities($firstInput)?>"/>
                    <?= displayErrors($validationErrors, 'firstInput')?>
                </div>
                <div class="<?= getFieldClass($validationErrors, 'secondInput')?>">
                    <label for="secondInput">Second Number</label>
                    <input type="text" name="secondInput" id="secondInput" value="<?= htmlentities($secondInput)?>"/>
                    <?= displayErrors($validationErrors, 'secondInput')?>
                </div>
                <div class="<?= getFieldClass($validationErrors, 'operation')?>">
                    <label for="operation">Select Operation</label>
                    <select name="operation" id="operation">
                        <option value="">----Select----</option>
                        <option value="+">addition</option>
                        <option value="-">subtraction</option>
                        <option value="*">multiplication</option>
                        <option value="/">division</option>
                    </select>
                    <?= displayErrors($validationErrors, 'operation')?>
                </div>
                <div>
                    <input type="submit" value="Calculate"/>
                </div>
            </form>
        </div>
        <?php if (!empty($_POST) && empty($validationErrors)) :?>
            <p>
                <?= $firstInput . ' ' . $operation . ' ' . $secondInput . ' = ' . $result?>
            </p>
        <?php endif;?>




    </body>
</html>