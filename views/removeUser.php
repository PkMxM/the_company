<?php
session_start();
if(!$_SESSION['id']){ //If the session id is not set
    header("location: loginRedirect.php");
    exit;
}

include_once "../classes/user.php";


//Are you sure you want to delete User ID x?
//if(Yes){
$user = new User;
$userID = $_GET['userID'];
$user->deleteUser($userID);
//}else {
//header("location:dashboard.php");    
//}
