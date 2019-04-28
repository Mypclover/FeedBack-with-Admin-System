<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
?>

<html>
<head>
</head>
<body>

<h1>
Test Page   <a href="logout.php">Click here</a>
</h1>
</body>
</html>