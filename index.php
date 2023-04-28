<?php

require "vendor/autoload.php";

// 1. What does this function session_start() do to the application?
// _____________________________________________________________________

session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
</head>
<body style = "text-align:center; background-color: #4FD7CB">

	<h1 style="font-size:50px; border: solid; border-style: outset; background-color:blue;">Analogy Exam Registration</h1>
	<h3 style="font-size:30px;">Kindly register your basic information before starting the exam.</h3>

	<form method="POST" action="register.php" style="border:solid; padding:20px; border-width: 10px; border-radius:5px; width:500px; margin:auto">
		<h4 style="font-weight:normal; font-size: 30px; line-height:0.5px; margin-bottom:10px;">Enter your full name:</h4><br />
		<input type="text" name="fullname" placeholder="Full Name" required style="height: 30px; width: 340px; font-size:20px" />
		<br />
		<h4 style="font-weight:normal; font-size: 30px; line-height:0.5px; margin-bottom:5px;">Email Address:</h4><br />
        <input type="email" name="email" placeholder="Email Address" required style="height: 30px; width: 340px; font-size:20px"/>
        <br />
        <h4 style="font-weight:normal; font-size: 30px; line-height:0.5px; margin-bottom:5px;">BirthDate:</h4><br />
        <input type="date" name="birthdate" placeholder="Birth Date" required style="height: 20px; width: 200px; height: 30px; font-size:20px"/>
		<input type="submit" value="submit" style="height: 30px; width: 100px; font-size: 20px"/>
	</form>
</body>
</html>

