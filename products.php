<?php
include 'dbconnect.php';
session_start();

$email = $_SESSION['user_data']['email'];

if (isset($_POST['remove']) && isset($_POST['img_src'])) {
    // Get the img_src of the product to remove
    $imgSrcToRemove = $_POST['img_src'];

    $removeQuery = "DELETE FROM products WHERE img_src = '$imgSrcToRemove' AND user_email = '$email'";
    if ($conn->query($removeQuery)) {
        echo '<script>alert("Product removed from database.");</script>';
    }
}

$query = "SELECT img_src, item_name, price FROM products ";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Product Details</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
    <style>
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
                                    <h2 class="text-center text-info m-0" style="color: black !important;">All Products</h2>
                                </td>

                            </tr>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) {?>
                                <tr>
                                    <td><img src="<?php echo $row['img_src']; ?>" alt="Product Image"></td>
                                    <td style="text-align: center;"><?php echo $row['item_name']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td>
                                        <form action="favourite.php" method="post">
                                            <input type="hidden" name="img_src" value="<?php echo $row['img_src']; ?>">
                                            <input type="hidden" name="item_name" value="<?php echo $row['item_name']; ?>"> <!-- Include the product name -->
                                            <button type="submit" name="remove" class="btn btn-danger">Remove</button>
                                        </form>
                                    </td>
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