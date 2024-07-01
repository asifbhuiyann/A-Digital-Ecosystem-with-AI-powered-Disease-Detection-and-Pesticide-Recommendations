<?php
include 'dbconnect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if file was uploaded without errors
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $imgSrc = "images/" . basename($_FILES["image"]["name"]);
        $uploadDir = "C:\\xampp\\htdocs\\Foshol\\new_prods\\"; // Update this with your upload directory
        $uploadFile = $uploadDir . basename($_FILES["image"]["name"]);

        // Check if the directory exists, if not, create it
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Move uploaded file to designated directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFile)) {
            // File uploaded successfully, now generate URL
            $url = "https://" . $_SERVER['HTTP_HOST'] . "/Foshol/new_prods/" . basename($_FILES["image"]["name"]); // Corrected URL generation

            // Get other form data
            $itemName = $_POST['item_name'];
            $price = $_POST['price'];

            // Insert data into database
            $sql = "INSERT INTO products (img_src, item_name, price) VALUES ('$url', '$itemName', '$price')";
            if ($conn->query($sql) === true) {
                echo '<script>alert("Product Added Successfully");</script>';
            } else {
                echo '<script>alert("Could not add product");</script>';
            }
        } else {
            echo '<script>alert("Sorry, there was an error uploading your file.");</script>';
        }
    } else {
        echo '<script>alert("No file was uploaded.");</script>';
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Products</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        header {
            background-color: #DDFFBB;
            color: black;
            padding: 20px 0;
            width: 100%;
            text-align: center;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            color: black;
        }

        nav li {
            margin: 0 20px;
            color: black;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            color: black;
        }

        #addProductForm {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            max-width: 100%;
            margin-top: 20px;
        }

        h1 {
            color: #4CAF50;
        }

        label {
            display: block;
            margin: 10px 0;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #2e4d1d;
            color: #fff;
            text-align: center;
            width: 100%;
            height: 40px;
            margin-top: 150px;
        }

        a:hover {
            color: #f07422;
        }
    </style>
</head>

<body>
    <header>
        <h1 id="title">ফসল</h1><br>
        <nav>
            <ul>
                <li><a href="homepage.php">হোমপেজ</a></li>
                <!-- <li><a href="about.php">আমাদের সম্পর্কে</a></li>
                <li><a href="service.php">আমাদের সেবা</a></li> -->
                <li><a href="user_profile.php">প্রোফাইল</a></li>
                <li><a href="feedback.php">প্রতিক্রিয়া জানান</a></li>
                <li><a href="https://weather-six-theta.vercel.app/?fbclid=IwAR02yOudHnHDnmagcdeuMwOPBkppIL_2s4s9v5CLYIn_XrnxryJpzPXVO6U">আবহাওয়ার পূর্বাভাস</a></li>
            </ul>
        </nav>
    </header><br><br><br>

    <div id="addProductForm">
        <h1 style="text-align: center;">নতুন পণ্য যোগ করুন</h1>
        <form method="post" enctype="multipart/form-data">
            <label for="image">ছবি:</label>
            <input type="file" id="image" name="image" required>

            <label for="item_name">পণ্যের নাম:</label>
            <input type="text" id="item_name" name="item_name" required>

            <label for="price">মূল্য:</label>
            <input type="text" id="price" name="price" required>

            <button type="submit">জমা দিন</button>
        </form>
        
    </div>

    <footer>
        <p>&copy; 2023 ফসল.</p>
    </footer>
</body>

</html>