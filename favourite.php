<?php
include 'dbconnect.php';
session_start();

$email = $_SESSION['user_data']['email'];

if (isset($_POST['remove']) && isset($_POST['img_src'])) {
    $imgSrcToRemove = $_POST['img_src'];
    $removeQuery = "DELETE FROM fav_prod WHERE img_src = '$imgSrcToRemove' AND user_email = '$email'";
    if ($conn->query($removeQuery)) {
        echo '<script>alert("Product removed from cart.");</script>';
    }
}

if (isset($_POST['update_quantity']) && isset($_POST['img_src']) && isset($_POST['quantity'])) {
    $imgSrcToUpdate = $_POST['img_src'];
    $newQuantity = $_POST['quantity'];

    $updateQuery = "UPDATE fav_prod SET quantity = '$newQuantity' WHERE img_src = '$imgSrcToUpdate' AND user_email = '$email'";
    if ($conn->query($updateQuery)) {
        echo '<script>alert("Quantity updated.");</script>';
    }
}

if (isset($_POST['order']) && isset($_POST['img_src']) && isset($_POST['item_name']) && isset($_POST['price']) && isset($_POST['quantity'])) {
    $imgSrc = $_POST['img_src'];
    $itemName = $_POST['item_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // Calculate the total price
    $totalPrice = $price * $quantity;

    // Update the price in fav_prod table
    $updatePriceQuery = "UPDATE fav_prod SET price = '$totalPrice' WHERE img_src = '$imgSrc' AND user_email = '$email'";
    if ($conn->query($updatePriceQuery)) {
        // echo '<script>alert("Price updated in cart.");</script>';
    } else {
        // echo '<script>alert("Error updating price in cart: ' . $conn->error . '");</script>';
    }

    // Insert the order into the orders table
    $insertOrderQuery = "INSERT INTO orders (img_src, item_name, price, user_email, quantity)
                        SELECT img_src, item_name, price, user_email, quantity FROM fav_prod
                        WHERE img_src = '$imgSrc' AND user_email = '$email'";

    if ($conn->query($insertOrderQuery)) {
        echo '<script>alert("Order placed successfully.");</script>';
    } else {
        echo '<script>alert("Error placing order: ' . $conn->error . '");</script>';
    }
}

$query = "SELECT img_src, item_name, price, quantity FROM fav_prod WHERE user_email = '$email'";
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
    <title>Favourite</title>
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
    <?php include 'nav.php'; ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="table-responsive mt-2">
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <td colspan="7">
                                    <h2 class="text-center text-info m-0" style="color: black !important;">কার্ট</h2>
                                </td>

                            </tr>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Remove</th>
                                <th>Order</th>
                            </tr>      
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><img src="<?php echo $row['img_src']; ?>" alt="Product Image"></td>
                                    <td style="text-align: center;"><?php echo $row['item_name']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td>
                                        <form action="favourite.php" method="post">
                                            <input type="hidden" name="img_src" value="<?php echo $row['img_src']; ?>">
                                            <input style="width: 50px;" type="number" name="quantity" value="<?php echo $row['quantity']; ?>" min="1">
                                            <button type="submit" name="update_quantity" class="btn btn-primary">Update</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="favourite.php" method="post">
                                            <input type="hidden" name="img_src" value="<?php echo $row['img_src']; ?>">
                                            <input type="hidden" name="item_name" value="<?php echo $row['item_name']; ?>"> <!-- Include the product name -->
                                            <button type="submit" name="remove" class="btn btn-danger">Remove</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="favourite.php" method="post">
                                            <input type="hidden" name="img_src" value="<?php echo $row['img_src']; ?>">
                                            <input type="hidden" name="item_name" value="<?php echo $row['item_name']; ?>">
                                            <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                                            <input type="hidden" name="email" value="<?php echo $row['user_email']; ?>">
                                            <input type="hidden" name="quantity" value="<?php echo $row['quantity']; ?>">
                                            <button type="submit" name="order" class="btn btn-danger">Place Order</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>