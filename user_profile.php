<?php
    // Include your database connection file
    include 'dbconnect.php';
    session_start();
    
    // Get the email of the logged in user
    $email = $_SESSION['user_data']['email'];
    
    // SQL query to fetch name and email from the users table for the logged in user
    $sql = "SELECT first_name, last_name, mobile_number, city, sex, email FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            $Name = $row["first_name"] . ' ' . $row["last_name"];
            $Email = $row["email"];
            $Mobile =$row["mobile_number"];
            $Sex =$row["sex"];
            $City =$row["city"];
        }
    } else {
        echo "No results for the current user";
    }
    $conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>User Profile</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }

        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .card {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            padding: 30px;
        }

        .info {
            color: #333;
            font-weight: bold;
        }

        h1 {
            color: #333;
            margin-bottom: 25px;
        }

        button.btn-dark {
            margin-top: 15px;
            transition: background-color 0.3s;
        }

        button.btn-dark:hover {
            background-color: #555;
        }

        a#pcng {
            color: white;
            text-decoration: none;
        }

        a#pcng:hover {
            color: #ddd;
        }

    </style>
</head>
<body>
<?php include 'nav.php'; ?>
<main>
    <section class="hero">
        <div class="container mt-5">
            <div class="card">
                <h1 class="text-center">ব্যক্তিগত তথ্য</h1>
                <div class="d-flex justify-content-center mt-4 mb-4">
                    <div class="card w-75">
                        <!-- Display fetched user data -->
                        <div class="d-flex flex-column align-items-center mt-3">
                            <div class="d-flex flex-row justify-content-center align-items-center mt-2">
                                <span class="info">নাম: <?php echo $Name; ?></span>
                            </div>
                            
                            <div class="d-flex flex-row justify-content-center align-items-center mt-2">
                                <span class="info">মেইল: <?php echo $Email; ?></span>
                            </div>

                            <div class="d-flex flex-row justify-content-center align-items-center mt-2">
                                <span class="info">মোবাইল নাম্বার: <?php echo $Mobile; ?></span>
                            </div>

                            <div class="d-flex flex-row justify-content-center align-items-center mt-2">
                                <span class="info">লিঙ্গ : <?php echo $Sex; ?></span>
                            </div>
                            <div class="d-flex flex-row justify-content-center align-items-center mt-2">
                                <span class="info">শহর : <?php echo $City; ?></span>
                            </div>
                            <div class="d-flex mt-3 mb-3">
                                <button class="btn btn-dark mr-3" style="border-radius: 5px;">
                                    <a id="pcng" href="editinfo.php">তথ্য হালনাগাদ করুন</a>
                                </button>
                                <button class="btn btn-dark" style="border-radius: 5px;">
                                    <a id="pcng" href="changepassword.php">পাসওয়ার্ড পরিবর্তন করুন</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </main>

    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
