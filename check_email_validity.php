<?php
require_once("includes/config.php");
// code user email availablity
if (!empty($_POST["emailaddress"])) {
	$email = $_POST["emailaddress"];
	if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

		echo "<span style='color:red'> You did not enter a valid email .</span>";
	} 
}


?>