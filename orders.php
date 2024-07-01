<?php
include 'dbconnect.php';
session_start();

$email = $_SESSION['user_data']['email'];

$query = "SELECT * FROM orders WHERE user_email = '$email'";
$result = $conn->query($query);

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Oders</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .container{
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
                                <td colspan="7">
                                    <h2 class="text-center text-info m-0" style="color: black !important;">Orders</h2>
                                </td>

                            </tr>
                            <tr>
                                <th>Serial Number</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>User</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) {?>
                                <tr>
                                    <td><?php echo $row['serial']; ?></td>
                                    <td><img src="<?php echo $row['img_src']; ?>" alt="Product Image"></td>
                                    <td style="text-align: center;"><?php echo $row['item_name']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td><?php echo $row['quantity']; ?></td>
                                    <td><?php echo $row['user_email']; ?></td>
                                    
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>