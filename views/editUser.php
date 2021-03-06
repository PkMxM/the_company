<?php
    session_start();
    session_start();

    if(!$_SESSION['id']){ //If the session id is not set
        header("location: loginRedirect.php");
        exit;
    }

    include_once "../classes/user.php";

    $user = new User;

    $userID =$_GET['userID'];
    $userDetails = $user->getUser($userID);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Edit User</title>
</head>
<body>
<!--nav -->
    <nav class="navbar navbar-expand md navbar-dark bg-dark">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">My Website</h1>
            </a>
            <div class="ml-auto">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link"><?= $_SESSION['username']?></a>      <!--add session_start() at the top of the document--> 
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Logout</a>
                    </li>           
                </ul>
            </div>
        </nav>
<!--main -->
    <div class="card w-25 my-5 mx-auto border-0">
        <div class="card-header bg-white border-0">
            <h1 class="text-center">EDIT USER</h1>
        </div>
        <div class="card-body">
            <form action="../actions/editUser.php" method="post">
                <input type="hidden" name="userID" value="<?= $userDetails['id']?>">
                <label for="firstName">First Name</label>
                <input type="text" name="firstName" id="firstName" class="form-control mb-2" value="<?= $userDetails['first_name'] ?>"  required>

                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" id="lastName" class="form-control mb-2" value="<?= $userDetails['last_name'] ?>" required>

                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control mb-2" maxlength="15" value="<?= $userDetails['username'] ?>" required>
            
                <div class="text-right">  
                    <button class="btn btn-warning btn-sm px-5" >SAVE</button>
                    <a href="dashboard.php" class="btn btn-secondary btn-sm">Cancel</a>
                </div>  
            </form>
        </div>   
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>