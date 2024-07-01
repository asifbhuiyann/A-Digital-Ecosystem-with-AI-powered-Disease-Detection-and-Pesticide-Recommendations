<?php
include 'dbconnect.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pw']);

    $sql = "SELECT * FROM admin WHERE email = '$username' and pw = '$password'";
    $result = mysqli_query($conn, $sql); 
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // Data found, you can fetch it
            echo '<script>alert("Email or Password is incorrect");</script>';;
        } else {
            echo '<script>alert("Email or Password is incorrect");</script>';
            // Query was successful, but no data was returned
        }
    } else {
        // Query failed
        echo "Error: " . mysqli_error($conn);
    }

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($row) {
        $active = $row['active'];
    }

    $count = mysqli_num_rows($result);
    echo "$count";
    if ($count == 1) {
        // Store user data in session
        $_SESSION['user_data'] = $row;
    
        // Set a cookie that expires when the session ends
        setcookie("user", $email, 0, "/"); // 0 means until the session ends
    
        header("location: admin-panel.php");
    } else {
        $error = "Your Email or Password is invalid";
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fosol Admin</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Source Sans Pro', sans-serif;
    background-color: #f4f6f9;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
}

.login-box {
    width: 360px;
}

.card {
    border: none;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}
.card-header {
    background-color: #ffffff;
    color: #000000;
    text-align: center;
    font-size: 40px;
}

.card-body {
    padding: 20px;
}

.form-control {
    border: 2px solid #d2d6de;
    border-radius: 5px;
    height: 30px;
    width: 90%;
}

.input-group-text {
    background-color: #d2d6de;
    border: 1px solid #ffffff;
}

.btn-primary {
    background-color: #f1f6fc;
    margin-left: 120px;
    border-radius: 5px;
    background-color: blue;
    color: white;
    width: 80px;
    height: 30px;
}
.btn-primary:hover {
    background-color: green;
    color: white; 
}
    </style>
</head>

<body class="login-page">

    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h3><b>FOSOL</b></h3>
            </div>
            <div class="card-body">
                <p style="text-align: center;" class="login-box-msg">FOSOL ADMIN PANEL</p><br>

                <form action="admin-panel.php" method="post">
                    <div class="input-group mb-3">
                        <input type="username" class="form-control" name="username" placeholder="Username">
                         <span class="fas fa-envelope"></span><br><br>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <span class="fas fa-lock"></span>
                    </div><br>
                    <div class="row">

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>
