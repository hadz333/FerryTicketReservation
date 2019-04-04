<html>
<head>
	<title>Ferry Ticket Confirmation</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
	<div id="confirmationDetails">
	<h2>Trip Details</h2>
	<?php

		$departureCity = $_GET['departure'];
		$arrivalCity = $_GET['arrival'];
		$date = $_GET['date'];
		echo "Departing from: " . $departureCity . "<br>";
		echo "Arriving at: " . $arrivalCity . "<br>";
		echo "Traveling on " . $date . "<br>";

		$carLength = $_GET['carLength'];

		// if vehicle length chosen is motorcycle
		if ($carLength == 'motorcycle') {
			$sidecar = false;
			$trailer = false;
			echo "Vehicle: motorcycle";

			// verifies if either additional motorcycle option is checked
			if(!isset($_GET['sidecar']))
			{
			     $sidecar = false;
			} else {
			     $sidecar = $_GET['sidecar'];
			}

			if(!isset($_GET['trailer']))
			{
			     $trailer = false;
			} else {
			     $trailer = $_GET['trailer'];
			}
			// if the sidecar/3+ wheels option for motorcycles was checked
			if ($sidecar) {
				echo " with a sidecar or more than 2 wheels";
				// in case both boxes are checked
				if ($trailer) { 
					echo " and a trailer";
				}
			} else if ($trailer) { // in case one box was checked
				echo " (with a trailer)";
			}
		} else {
			echo "Vehicle: Sedan/Truck <br>";
			// if vehicle isn't a motorcycle, it will have length options
			echo "Vehicle length: ";
			$carHeight = $_GET['carHeight'];

			// if over 22ft, get the number entered and display
			if ($carLength == 'over22') {
				echo $_GET['totalLength'] . " ft <br>";
			} else {
				echo " under 22 ft <br>";
			}

			echo "Vehicle height: ";
			switch ($carHeight) {
				case 'height1':
					echo "under 7'2\" tall";
					break;
				case 'height2':
					echo "7'2\" to 7'6\" tall";
					break;
				case 'height3':
					echo "7'6\" to 13' tall";
					break;
				case 'height4':
					echo "over 13' tall";
					break;
				default:
					break;
			}
			echo "<br>";
		}
	?>
	</div>
	<br>
	<input type="submit" value="Confirm" class="btn">
	
</body>
</html>