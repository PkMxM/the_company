<?php
include "../classes/user.php";

//Colllect all data from the form
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$username = $_POST['username'];
$password = password_hash($_POST['password'],PASSWORD_DEFAULT);
$origin = $_POST['btnRegister']; //$origin = "dashboard"< $origin = "register"


//Create object
//Access the method
$user = new User;
$user->createUser($origin,$firstName,$lastName,$username,$password);
