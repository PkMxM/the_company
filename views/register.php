<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>

    <div class="card w-25 my-5 mx-auto border-0">
        <div class="card-header bg-white border-0">
            <h1 class="text-center">REGISTER</h1>
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

                <button type="submit" name="btnRegister" value="register" class="btn btn-success btn-block">Register</button>
            </form>

            <div class="text-center mt-3 small">
                <p>Registered already?<a href="../views">Login</a></p>
            </div>
        </div>
    </div>
    
</body>
</html>