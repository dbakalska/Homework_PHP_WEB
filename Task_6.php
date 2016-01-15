<?php
/* Задача 6:Създайте HTML страница с PHP скрипт, в който потребителя трябва да
въведе име, фамилия и да избере дата на раждане (ден, месец,
година). Ако потребителя не е въвел някое поле, нека въведената от
него стойност да се запази във формата.*/

require_once 'functions.php';
$result = [];
$validationErrors = [];
$firstName = getValue($_POST, 'firstname');
$lastName = getValue($_POST, 'lastname');
$month = getValue($_POST, 'DOBMonth');
$day = getValue($_POST, 'DOBDay');
$year = getValue($_POST, 'DOBYear');
$months = [
    'Jan' => 'Jan',
    'Feb' => 'Feb',
    'Mar' => 'Mar',
    'Apr' => 'Apr',
    'May' => 'May',
    'June' => 'June',
    'July' => 'July',
    'Aug' => 'Aug',
    'Sept' => 'Sept',
    'Oct' => 'Oct',
    'Nov' => 'Nov',
    'Dec' => 'Dec',
];

$days = [];
for($i = 01; $i <= 31; $i++){
    $days[$i] = $i;
}

$years = [];
for($i = 1950; $i <= 2000; $i++){
    $years[$i] = $i;
}

function detailsValidation(&$errors)
{
    global $firstName, $lastName, $day, $month, $year;

    $errors = [];

    if (!validateRequired($firstName)) {
        $errors['firstname'][] = 'First Name is required';
    } else if (!validateLongerOrEqualString($firstName, 2)) {
        $errors['firstname'][] = 'First Name must be at least 2 characters long';
    }

    if (!validateRequired($lastName)) {
        $errors['lastname'][] = 'Last Name is required';
    } else if (!validateLongerOrEqualString($lastName, 2)) {
        $errors['lastname'][] = 'Last Name must be at least 2 characters long';
    }

    if (!validateRequired($month)) {
        $errors['DOBMonth'][] = 'Month is required';
    }
    if (!validateRequired($day)) {
        $errors['DOBDay'][] = 'Day is required';
    }
    if (!validateRequired($year)) {
        $errors['DOBYear'][] = 'Year is required';
    }
    return empty($errors);
}

function getFieldClass($errors, $field) {
    return !empty($errors[$field]) ? 'error' : '';
}

if(!empty($_POST)){
    $result = detailsValidation($validationErrors);
    detailsValidation($validationErrors);

    if($result){
        $result =[
            'First Name' => $firstName,
            'Last Name' => $lastName,
            'Date of Birth' => "$day" . " " . "$month" . " " . "$year"
        ];
    } else{
        $result = [];
    }
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Task 6</title>
        <style type="text/css">
            input {
                padding: 0.3em;
                margin: 0 0 0.8em 0.8em;
            }
            .error {
                color: red;
            }
            .error p {
                padding-left: 100px;
            }
        </style>
	</head>
	<body>
		<h1>Add your details</h1>

		<form action="" method="post">
            <div class="<?= getFieldClass($validationErrors, 'firstname')?>">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" id="firstname" value="<?= htmlentities($firstName)?>"/>
                <?= displayErrors($validationErrors, 'firstname')?>
            </div>
            <div class="<?= getFieldClass($validationErrors, 'lastname')?>">
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lastname"  value="<?= htmlentities($lastName)?>"/>
                <?= displayErrors($validationErrors, 'lastname')?>
            </div>
            <div>
                <label>Birth date:</label>
                <select name="DOBMonth" class="<?= getFieldClass($validationErrors, 'DOBMonth')?>">
                    <option value=""> - Month - </option>
                    <?= options($months, $month) ?>
                </select>
                <?= displayErrors($validationErrors, 'DOBMonth')?>

                <select name="DOBDay" class="<?= getFieldClass($validationErrors, 'DOBDay')?>">
                    <option value=""> - Day - </option>
                    <?= options($days, $day) ?>
                </select>
                <?= displayErrors($validationErrors, 'DOBDay')?>

                <select name="DOBYear" class="<?= getFieldClass($validationErrors, 'DOBYear')?>">
                    <option value=""> - Year - </option>
                    <?= options($years, $year) ?>
                </select>
                <?= displayErrors($validationErrors, 'DOBYear')?>
            </div>

            <div>
                <input type="submit">
            </div>

            <div name="result">
                <?php foreach($result as $label => $value): ?>
                    <p><?= $label ?> : <?= $value ?></p>
                <?php endforeach; ?>
            </div>
    </body>
</html>