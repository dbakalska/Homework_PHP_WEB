<!--Задача 4: Създайте HTML страница с PHP скрипт, вкойто потребителя трябва да въведете 10
числа. След това ги сложете в array, сортирайте ги и ги изпишете сортирани. Намерете
най-малкото и най-голямото число и ги изпишете.-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Task 4</title>
        <style type="text/css">
            input {
                display: block;
                padding: 0.3em;
                margin: 0 0 0.8em 0.8em;
            }
        </style>
    </head>
    <body>
    <form action="" method="post">
        <p>Please, enter a number in each field:</p>
        <input type="text" name="number">
        <input type="text" name="number1">
        <input type="text" name="number2">
        <input type="text" name="number3">
        <input type="text" name="number4">
        <input type="text" name="number5">
        <input type="text" name="number6">
        <input type="text" name="number7">
        <input type="text" name="number8">
        <input type="text" name="number9">
        <input type="submit">
    </form>
    <div></div>
    <?php
    if(!empty($_POST)) {
        foreach ($_POST as $field => $input) {
            if (empty($_POST[$field])) {
                echo 'All fields are required';
                break;
            } else if (preg_match('/[0-9]/', $_POST[$field]) == false) {
                echo "Please, enter numbers only";
                break;
            } else {
                sort($_POST);
                $array = join(', ', $_POST);
                $min = min($_POST);
                $max = max($_POST);
                echo "The numbers you have entered are: $array. ",
                "The min number is $min, and the max number is $max.";
                break;
            }
        }
    }
    ?>
    </body>
</html>
