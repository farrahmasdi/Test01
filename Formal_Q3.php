<!DOCTYPE html>
<html>
<head>
	<title>Question 3</title>
	<style>
		h1 {text-align: center;}
		h3 {text-align: center;}
		p {text-align: center;}
		div {text-align: center;}
	</style>
</head>
<body>
	<h1>Car Seller</h1>
	<!-- <h1 style="text-align: center;">Car Seller</h1> -->
	<!--code goes here -->
	<form method="post" action="Formal_Q3.php">
		<p><label for="cusName">Customer Name</label>
			<input type="text" name="cusName"/>  </p>
		<!-- alternative 
		As long as the output looks the same
		Customer Name
		 	<input type="text" name="cusName"/>  
			 test remote 001
		 -->

		 <p><label for="cars">Car Name</label>
		 	<select name="cars" id="cars">
		 		<?php
		 		$carNameArray = array("Volvo", "Mercedes", "Audi");

		 		foreach($carNameArray as $carValue){
		 			?>
		 			<option value=<?php echo $carValue?>>
		 				<?php echo $carValue?></option>
		 			<?php
		 		}

		 		?>
		 	}
		 </select>
		</p>
		<p>
			<p>
				<label for="price">Selling Price</label>
				<input type="number" name="price" value="0"/>
			</p>

			<p>
				<label for="cashLoan">Payment Type</label>
				<input type="radio" name="cashLoan" id="Cash"
				value=0 checked="checked">Cash

				<input type="radio" name="cashLoan" id="Loan"
				value=1>Loan
			</p>
			<p>
				<label for="discount">Cash Discount (%)</label>
				<input type="number" name="discount" value="0"/>
			</p>
			<p>
				<label for="instalment">Loan Repayment Period (Months)</label>
				<input type="number" name="instalment" value="0"/>
			</p>
			<p>
				<input type="submit" value="Submit" name="submit">
			</p>
		</form>

		<?php
		if(isset($_POST['submit'])){
			$cusName = $_POST['cusName'];
			$carType = $_POST['cars'];
			$paymentType = $_POST['cashLoan'];
			$discount = $_POST['discount'];
			$price = $_POST['price'];
			$instalment = $_POST['instalment'];
			$totalPrice = 0;
			$paymentName = "Cash";
			$discountValue = 0;
			$loanPayment = 0;

				// check for error
				//name must not be empty
				//selling price must not be 0
				//cash discount must not be 0 if cash is selected

			if (empty($cusName) And $price <=0){
				echo "<h3> Customer name should not be empty and ";
				echo "selling price cannot be 0 </h3>";
			}
			elseif($instalment <= 0 And $paymentType = 1){
				echo "<h3> Repayment Period must no be 0 ";
				echo "</h3>";
			}
			else{



				if($paymentType == 0){
					$discountValue = $discount/100 * $price;
					$totalPrice = $price - round($discountValue,2);
					$paymentName = "Cash";
				}
				else{
					$totalPrice = $price;
					$paymentName = "Loan";
					$loanPayment = $totalPrice/$instalment;
					$discount = 0;
				}
				?>



				<table border="1" width="100%">
					<tr>
						<th>Customer Name
						</th>
						<th>Car Name
						</th>
						<th>Price
						</th>
						<th>Payment Type
						</th>
						<th>Price
						</th>
					</tr>
					<tr>
						<td>
							<?php
							echo $cusName;
							?>
						</td>
						<td>
							<?php
							echo $carType;
							?>
						</td>
						<td>
							<?php
							echo "$" . number_format($price,2);
							?>
						</td>
						<td>
							<?php
							echo $paymentName;
							?>
						</td>
						<td>
							<?php
							echo "$" . number_format($price,2);
							?>
						</td>
					</tr>
					<?php 
						if($paymentType == 0 And $discountValue > 0){
						?>
							<tr>
								<td colspan="3">Cash Discount Applied</td>
								<td><?php echo number_format($discount,2)."%"; ?></td>
								<td><?php echo "$" . number_format($discountValue,2); ?></td>
							<tr>
						<?php
						}
						if($paymentType == 1){
						?>
							<tr>
								<td colspan="4">Monthly Payment</td>
								<td><?php echo $instalment. " months x $" . number_format(
									$loanPayment,2); ?></td>
							<tr>
						<?php
							}
							?>
						<tr>
						<td colspan="4">Total Price</td>
						<td>
							<?php
							echo "$" . number_format($totalPrice,2);
							?>
						</td>
						<tr>
					
				</table>

				<?php
			}
		}

		?>
		
	</body>
	</html>