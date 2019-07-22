<!DOCTYPE html>
<html>
	<head>
		<title>Customer Receipt</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style>
			<?php include 'receipt.css'; ?>
		</style>
	</head>
	<body>
		<header>
			<h3> Jarod's Shoe Store </h3>
		</header>
		<br>
		<?php
		
			$firstName = $_GET['txtFirstName'];
			$lastName = $_GET['txtLastName'];
			$address = $_GET['txtAddress'];
			$city = $_GET['txtCity'];
			$province = $_GET['txtProvince'];
			$postalCode = $_GET['txtPostalCode'];
			$phoneNumber = $_GET['txtPhoneNumber'];
			$subtotal = 0.0;
			$delivery = 0.0;
			$deliveryDate = "";
			$tax = 0.0;
			$total = 0.0;
		
			//$postalCode = "";
			//$phoneNumber = "";
			
			if (($firstName == "" || $firstName == null) ||
			($lastName == "" || $lastName == null) || 
			($address == "" || $address == null) ||
			($city == "" || $city == null) ||
			($province == "" || $province == null) ||
			(!preg_match("/^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/", $postalCode)) ||
			(!preg_match("/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/", $phoneNumber))
			)
			{
				print("Entered data is no longer valid. Please go back and try again.<br><br>");
			}
			else
			{
				print("Your order has been processed. Please verify the information.<br><br>");
				print("<h1>Shipping To:</h1><br>");
				print("
					<div>$lastName, $firstName</div>
					<div>$address</div>
					<div>$city, $province</div>
					<div>$postalCode</div>
					<div>$phoneNumber</div>
				");
				
				print("<h1>Order Information:</h1><br>");
				if(isset($_GET['nmdShoe']))
				{
					$nmdShoe = $_GET['nmdShoe'];
					if ($nmdShoe == "on")
					{
						print("<div>Adidas NMD R2 - Black and Gum <div class='currency'>$250.00 CAD</div></div>");
						$subtotal += 250.00;
					}
				}
				if(isset($_GET['tubularShoe']))
				{
					$tubularShoe = $_GET['tubularShoe'];
					if ($tubularShoe == "on")
					{
						print("<div>Adidas Tubular Doom Sockfit - Tan <div class='currency'>$170.00 CAD</div></div>");
						$subtotal += 170.00;
					}
				}
				if(isset($_GET['yeezyShoe']))
				{
					$yeezyShoe = $_GET['yeezyShoe'];
					if ($yeezyShoe == "on")
					{
						print("<div>Adidas Yeezy Boost 350 - Turtle Dove <div class='currency'>$1250.00 CAD</div></div>");
						$subtotal += 1250.00;				
					}
				}
				$subtotal = number_format((float)$subtotal, 2, '.', '');
				print("<br><div>Subtotal<div class='currency'>$$subtotal CAD</div></div>");
				
				if($subtotal <= 250)
				{
					$delivery = 3;
					$deliveryDate = date("Y-m-d", strtotime("+1 day"));
				}
				if($subtotal > 250 && $subtotal <= 500)
				{
					$delivery = 4;
					$deliveryDate = date("Y-m-d", strtotime("+1 day"));
				}
				if($subtotal > 500 && $subtotal <= 750)
				{
					$delivery = 5;
					$deliveryDate = date("Y-m-d", strtotime("+3 day"));
				}
				if($subtotal > 750)
				{
					$delivery = 6;
					$deliveryDate = date("Y-m-d", strtotime("+4 day"));
				}
				$delivery = number_format((float)$delivery, 2, '.', '');
				print("<div>Delivery<div class='currency'>$$delivery CAD</div></div>");
				$tax = ($subtotal + $delivery) * 0.13;
				$tax = number_format((float)$tax, 2, '.', '');
				print("<div>Tax<div class='currency'>$$tax CAD</div></div>");
				$total = $subtotal + $delivery + $tax;
				$total = number_format((float)$total, 2, '.', '');
				print("<br><div>Total<div class='currency'>$$total CAD</div></div>");
				print("<br><br>Estimated Delivery Date: $deliveryDate<br><br>");
			}
		?>
	</body>
</html>