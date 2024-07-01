
<?php
include 'dbconnect.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pw']);

    $sql = "SELECT * FROM users WHERE email = '$email' and pw = '$password'";
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
    
        header("location: homepage.php"); // Redirect to welcome.php
    } else {
        $error = "Your Email or Password is invalid";
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-FOSOL</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
        body{
            background-image: url("village-life.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body class=" min-h-screen flex items-center justify-center">
    <div class="bg-gradient-to-r from-green-100 to-gray-200  p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 style="text-align: center;" class="text-2xl font-semibold mb-4 italic">ফসল</h1>
        <small class="text-center mb-5 text-gray-600 text-gray-600">আগামীর বাংলাদেশ হবে আধুনিক কৃষি নির্ভর</small>
        <form action="login.php" method="post">
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">ইমেইল</label>
                <input type="email" id="email" name="email" class="mt-1 px-4 py-2 w-full border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">পিন নম্বর</label>
                <input type="password" id="password" name="pw" class="mt-1 px-4 py-2 w-full border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="">
            </div>
            <button type="submit" class="w-full bg-gradient-to-r from-green-200 to-green-500 text-gray-700 py-2 rounded-lg">প্রবেশ করুণ</button>
        </form>
        <p class="mt-4 text-sm text-gray-600">এখনো ফসলের সদস্য না? <a href="signup.php" class="text-blue-500 hover:underline" target="_blank">নতুন একাউন্ট খুলুন!</a></p>
    </div>

    <script>
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');

        animatePlaceholder(emailInput, 'ইমেইল দিন');
        animatePlaceholder(passwordInput, 'পাসওয়ার্ড দিন');

        function animatePlaceholder(inputElement, placeholderText) {
            let currentText = '';
            let currentIndex = 0;

            function updatePlaceholder() {
                inputElement.placeholder = currentText;
            }

            function typeNextCharacter() {
                currentText = placeholderText.slice(0, currentIndex + 1);
                updatePlaceholder();
                currentIndex++;

                if (currentIndex < placeholderText.length) {
                    setTimeout(typeNextCharacter, 100); // Adjust typing speed here
                }
            }

            inputElement.addEventListener('focus', () => {
                currentIndex = 0;
                typeNextCharacter();
            });
        }
    </script>
</body>
</html>

