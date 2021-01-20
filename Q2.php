<!DOCTYPE html>
<html>
<head>
	<title>Question 2</title>
	<style>
		h1 {text-align: center;}
		h3 {text-align: center;}
		p {text-align: center;}
		div {text-align: center;}
	</style>
</head>
<body>
	<h1>Sum and Multiplication Calculator</h1>
	<!-- <h1 style="text-align: center;">Car Seller</h1> -->
	<!--code goes here -->
	<form method="post" action="Q2.php">
		<p><label for="minimum">Minimum Value:</label>
			<input type="number" name="minimum"/>  
		</p>
		<p><label for="maximum">Maximum Value:</label>
			<input type="number" name="maximum"/>  
		</p>
		<p><label for="number">Number of Values to Generate:</label>
			<input type="number" name="number"/>  
		</p>
		<p>
			<input type="submit" value="Sum" name="sum">
			<input type="submit" value="Multiply" name="multiply">
		</p>
	</form>
	<?php
	if(isset($_POST['sum']) || isset($_POST['multiply'])){
		$min = $_POST['minimum'];
		$max = $_POST['maximum'];
		$number = $_POST['number'];

		for($i=0; $i<$number; $i++){
			$numArray[$i] = rand($min,$max);
		}

		echo 'The minimum value is: '. $min . '<br>';
		echo 'The maximum value is: '. $max . '<br>';

		if(sizeof($numArray) > 0){
			echo "\"" .$number. "\"" . ' random numbers generated: ';
			echo implode(',',$numArray);
		}
		echo '<br>';
		if(isset($_POST['sum'])){
			echo 'The sum of the random generated number: ';
			echo implode('+',$numArray).'=';
			$total = 0;
			for($i=0; $i<$number; $i++){
			$total = $numArray[$i] + $total;
			}
			echo $total;
		}
		if(isset($_POST['multiply'])){
			echo 'The multiplication of the random generated number: ';
			echo implode('x',$numArray).'=';
			$total = 1; //preset to 1 so multiplication does not equal to 0
			//other methods are also accepted as long as the output is correct
			for($i=0; $i<$number; $i++){
			$total = $total * $numArray[$i];
			
			}
			echo $total;

		}
		
	}
	?>


</body>
</html>