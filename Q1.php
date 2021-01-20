<!DOCTYPE html>
<html>
<head>
	<title>Question 1</title>
	<style>
		h1 {text-align: center;}
		h3 {text-align: center;}
		p {text-align: center;}
		div {text-align: center;}
	</style>
</head>
<body>
		<h1>Counting alphabets and numbers in a string</h1>
	<!-- <h1 style="text-align: center;">Car Seller</h1> -->
	<!--code goes here -->
	<form method="post" action="Q1.php">
		<p><label for="enterText">Please enter text:</label>
			<br>
			<textarea name="enterText" rows="4" cols="50"></textarea>  </p>
			<p>
				<input type="submit" value="Submit" name="submit">
			</p>
		</form>
	<?php
		if(isset($_POST['submit'])){
		$text = $_POST['enterText'];
		$specialChar = array(" ","!", "#", ",");
		echo "Original Input: " . $text;
		echo "<br>";
		$text = strtoupper($text);
		echo "Uppercase output: " . $text;
		echo "<br>";
		$text = str_replace($specialChar, "", $text);
		echo "Without special characters output: " . $text;
		echo "<br>";
		$splitText = str_split($text);
		$alphabets = 0;
		$number = 0;
		$highestNumber = 0;
		foreach($splitText as $splitValue){
			if(is_numeric($splitValue)){
				$number = $number + 1;
			}
			//chang question to non-numerical
			elseif(ctype_alpha($splitValue)){
				$alphabets = $alphabets + 1;
			}
			/*else{
				$alphabets = $alphabets + 1;
			}*/

		}
		echo "Total count of numerical values: " . $number;
		echo "<br>";
		echo "Total count of non-numerical values: " . $alphabets;
		echo "<br>";
	}

	//check the highest value in the string
	?>

		
	</body>
	</html>