<?php
include 'dbconnect.php';
session_start();

$email = $_SESSION['user_data']['email'];

$query = "SELECT first_name, last_name, mobile_number, sex, city, birth_date, email, pw FROM users WHERE email = '$email'";
$result = $conn->query($query);

// Assuming you expect only one row, use if instead of while
if ($row = $result->fetch_assoc()) {
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Details</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
    <style>
        .container {
            padding-bottom: 10px;
        }

        td {
            text-align: center;
        }

        td img {
            height: 8rem;
            border-radius: 1.5rem;
            width: 50%;
        }

        table h4 {
            color: black !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="table-responsive mt-2">
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <td colspan="8">
                                    <h2 class="text-center text-info m-0" style="color: black !important;">User Details</h2>
                                </td>
                            </tr>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Mobile Number</th>
                                <th>Sex</th>
                                <th>City</th>
                                <th>Birth Date</th>
                                <th>Email</th>
                                <th>Password</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $row['first_name']; ?></td>
                                <td><?php echo $row['last_name']; ?></td>
                                <td><?php echo $row['mobile_number']; ?></td>
                                <td><?php echo $row['sex']; ?></td>
                                <td><?php echo $row['city']; ?></td>
                                <td><?php echo $row['birth_date']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['pw']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<?php
} else {
    echo "User not found or no data available.";
}
?>
