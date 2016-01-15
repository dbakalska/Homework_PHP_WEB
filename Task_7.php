<?php
/* Задача 7: Създайте HTML страница с PHP скрипт, в който изписва информация за
browser-a, с който е отворен този скрипт. Нека след това да се изпише
информация за сървъра и за host-a. Коя системна променлива ще
използвате, за да извлечете тези информация?*/

$browser = $_SERVER['HTTP_USER_AGENT'];
$server = $_SERVER['SERVER_SOFTWARE'];
$host = $_SERVER['HTTP_HOST'];

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Task 07</title>
    </head>
    <body>
        <p>The browser that you use is <?= $browser?></p>
        <p>Server info: <?= $server?></p>
        <p>Host info: <?= $host?></p>
    </body>
</html>
