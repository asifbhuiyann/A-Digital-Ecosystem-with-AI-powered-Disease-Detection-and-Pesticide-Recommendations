<?php
include 'dbconnect.php';
session_start();
$email = $_SESSION['user_data']['email'];

$sql = "SELECT full_name FROM admin WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $Name = $row["full_name"];
    }
} else {
    echo "No results for the current user";
}

$query = "SELECT img_src FROM products ";
$result = $conn->query($query);

$totalImages = $result->num_rows;

$countQuery = "SELECT COUNT(*) AS total_users FROM users";
$countResult = $conn->query($countQuery);

if ($countRow = $countResult->fetch_assoc()) {
    $totalUsers = $countRow['total_users'];
}

$query = "SELECT * FROM orders WHERE user_email = '$email'";
$result = $conn->query($query);

if (!$result) {
    die("Query failed: " . $conn->error);
}

$totalOrders = mysqli_num_rows($result);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff !important;
            padding: 10px;
            text-align: center;
        }
        header a{
            text-decoration: none;
            color: white;
        }
        nav {
            background-color: #555;
            color: #fff;
            padding: 10px;
            text-align: center;
            width: 200px;
            position: fixed;
            height: 100%;
        }

        nav a {
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 10px;
            margin: 0 0 5px;
        }
        nav a:hover {
            transform: translateY(-5px);
            font-size: 20px;
            color: tomato;
        }
        section {
            margin-left: 220px;
            padding: 20px;
        }

        h2 {
            color: #333;
        }
        .dashboard p{
            color: black;
            text-align: center;
            font-size: 30px;
            text-decoration: none;
            font-weight: bold;
        }
        p{
            color: black;
            text-align: center;
            font-size: 30px;
            text-decoration: none;
        }
        .total-products p{
            text-decoration: none;
        }
        .red-container {
            background-color: red;
            padding: 20px;
            margin-top: 20px;
            margin-left: 270px;
            width: 400px;
            border-radius: 20px;
        }
        .red-container p{
            text-decoration: none;
            color: white;
        }
        .green-container {
            background-color: green;
            padding: 20px;
            margin-top: 20px;
            margin-left: 270px;
            width: 400px;
            border-radius: 20px;
        }
        .green-container p{
            text-decoration: none;
            color: white;
        }
        .yellow-container {
            background-color: violet;
            padding: 20px;
            margin-top: 20px;
            margin-left: 270px;
            width: 400px;
            border-radius: 20px;
        }
        .yellow-container p{
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>

    <header>
        <a href="admin-panel.php"><h1>Admin Panel</h1></a>
        <h3 style="text-align: center;">Welcome, <?php echo $Name; ?></h3><br>
    </header>

    <nav>
        <a href="user_details.php">Users</a>
        <a href="products.php">Products</a>
        <a href="orders.php">Orders</a>
        <a href="logout.php">Logout</a>
    </nav>
        <div class="dashboard">
        <p style="text-align: center;">DASHBOARD</p>
        </div>

        <div class="red-container">
        <p>Total Number of Products: <?php echo $totalImages; ?></p></p>
    </div>

    <div class="green-container">
        <p>Total Number of Users: <?php echo $totalUsers; ?></p></p>
    </div>

    <div class="yellow-container">
        <p>Total Number of Orders: <?php echo $totalOrders; ?></p></p>
    </div>
</body>
</html>
</html>