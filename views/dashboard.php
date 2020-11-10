<?php
    session_start();
    /* PUT THIS AT THE TOP OF INTERNAL PAGES */
    if(!$_SESSION['id']){ //If the session id is not set
        header("location: loginRedirect.php");
        exit;
    }
/**************************************************/
    include_once "../classes/user.php";

    $user = new User;
    $userList = $user->getUsers();

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
<title>Dashuboard</title>
</head>
<body>
    <nav class="navbar navbar-expand md navbar-dark bg-dark">
        <a href="dashboard.php" class="navbar-brand">
            <h1 class="h3">The company</h1>
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
    <main class="container" style="padding-top: 80px">
        <table class="table table-hover w-50 mx-auto">
            <thead class="thead-light">
                <th>#</th>
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th>USERNAME</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                while($userDetails = $userList->fetch_assoc()){
                ?>
                    <tr>
                        <td><?= $userDetails['id'] ?></td>
                        <td><?= $userDetails['first_name'] ?></td>
                        <td><?= $userDetails['last_name'] ?></td>
                        <td><?= $userDetails['username'] ?></td>
                        <td>
                            <a href="editUser.php?userID=<?= $userDetails['id']?>" class="btn btn-warning btn-sm my-2">EDIT</a>
                            <a href="removeUser.php?userID=<?= $userDetails['id']?>" class="btn btn-danger btn-sm my-2">Remove</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </main>
    <div class="card w-25 my-5 mx-auto border-0">
        <div class="card-header bg-white border-0">
            <h1 class="text-center"></h1>
        </div>
        <div class="card-body">
            <form action="../actions/register.php" method="post">
                <label for="firstName">First Name</label>
                <input type="text" name="firstName" id="firstName" class="form-control mb-2" required>

                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" id="lastName" class="form-control mb-2" required>

                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control mb-2" maxlength="15" required>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control mb-5" required>

                <button type="submit" name="btnRegister" value="dashboard" class="btn btn-success btn-block">Add User</button>
            </form>            
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

