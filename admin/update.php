<?php

/**
  * Use an HTML form to edit an entry in the
  * users table.
  *
  */

require_once "config.php";

	// Check connection
	if($link === false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
	}


if (isset($_GET['id'])) {
  echo $_GET['id']; // for testing purposes
} else {
    echo "Something went wrong!";
    exit;
}
?>