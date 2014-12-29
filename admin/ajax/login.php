<?php
session_start();
$user;
$pass;
$error = false;

// check username
if (isset($_POST["user"])) 
	$user = $_POST["user"];
else 
	$error = true;

// check password
if (isset($_POST["password"]))
	$pass = $_POST["password"];
else
	$error = true;

if (empty($user) || empty($pass)) {
	$error = true;
}

// got data
if (!$error) {
	
	// HACER LOGIN ACA
	echo 'falta hacer logica de login';

} else {	
	$_SESSION['message'] = "Debe ingresar todos los campos";	
	header('Location: ../');
}

?>