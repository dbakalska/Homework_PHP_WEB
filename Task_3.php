<!--Задача 3: Създайте HTML страница с PHP скрипт, в който потребителя трябва да въведе стойност-->
<!--в градуси Celsius C и на трябва да получи градуси Fahrenheit F.-->
<!--Използвайте формулата C = ( 5 / 9 ) * (F -32). След това доразширете задачата, като-->
<!--добавите лист, от който потребителя да сам да избере дали да конвертира от C към F или от F към C.-->
<!DOCTYPE html>
<html>
    <head>
		<meta charset="UTF-8">
        <title>Task 3</title>
		<style type="text/css">
			h3 {
				margin-left: 60px;
			}
			label {
				display: inline-block;
				text-align: right;
				width: 150px;
				margin: 0.5em 0.3em;
			}
			input {
				width: 85px;
			}
			#btn {
				margin-left: 165px;
			}
			#result {
				margin-left: 160px;
			}
		</style>
    </head>
    <body>
		<h3>Convert Temperature</h3>
        <form action="" method="get">
			<div>
				<label for="degrees">Enter temperature</label>
				<input type="number" name="degrees" id="degrees">
			</div>
			<div>
				<label>From</label>
				<select name="from">
					<option value="from_c" name="celsius" selected>Celsius</option>
					<option value="from_f" name="fahrenheit">Fahrenheit</option>
				</select>
			</div>
			<div>
				<label>To</label>
				<select name="to">
					<option value="to_c" name="celsius">Celsius</option>
					<option value="to_f" name="fahrenheit" selected>Fahrenheit</option>
				</select>
			</div>
			<input type="submit" name="submit" id="btn" value="Convert">
			<p id="result">
			<?php
				function c_to_f($input) {
					$fahrenheit = $input * 9/5 + 32;
					return $fahrenheit ;
				}
				function f_to_c($input) {
					$celsius = 5/9 * ($input - 32);
					return $celsius ;
				}
				if (isset($_GET['submit'])) {
					$degrees = $_GET['degrees'];
					$from = $_GET['from'];
					$to = $_GET['to'];
					$result = '';

					if ($from == 'from_c' && $from != $to) {
						$result = c_to_f($degrees);
						echo "$degrees °C = $result °F";
					}
					if ($from == 'from_f' && $from != $to) {
						$result = f_to_c($degrees);
						echo "$degrees °F = $result °C";
					}
				}
			?>
			</p>
		</form>
    </body>
</html>
