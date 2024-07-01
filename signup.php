<?php
include 'dbconnect.php';
$message = '';

// Check if the save button was clicked
if (isset($_POST['save'])) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $mobile_number = $_POST["mobile_number"];
    $sex = $_POST["sex"];
    $city = $_POST["city"];
    $birth_date = $_POST["birth_date"];
    $email = $_POST["email"];
    $password = $_POST["pw"];

    $sql = "INSERT INTO users (first_name, last_name, mobile_number, sex, city, birth_date, email, pw) 
    VALUES ('$first_name','$last_name', '$mobile_number', '$sex' , '$city' ,'$birth_date', '$email','$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Sign Up Successful');</script>";
        setcookie("user", $email, 0, "/"); // 0 means until the session ends
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="/Portfolio/Portfolio/Css/portfoliodesktop.css" media="screen and (min-width: 992px)">
</head>
<style>
    
body {
    font-family: Arial, sans-serif;
    background-color: #2e4d1d;
    margin: 0;
    padding: 0;
}

.container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 100vh;
}

.left-section {
    flex: 1;
    padding: 50px;
    background-color: #d3e0c7;
    color: #000000;
    text-align: center;
}

.left-section h1 {
    font-size: 48px;
}

.left-section p {
    font-size: 24px;
}

.right-section {
    flex: 1;
    padding: 50px;
    background-color: #d3e0c7;
    border-radius: 10px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
}

.right-section h2 {
    font-size: 36px;
    color: #354f52;
    margin-bottom: 20px;
}

.form-group {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

input[type="text"],
input[type="email"],
input[type="date"],
input[type="tel"],
input[type="password"] {
    width: 48%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

.btn {
    background-color: #f2a154;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 15px 20px;
    font-size: 20px;
    cursor: pointer;
}

.btn:hover {
    background-color: #f07422;
}
nav ul {
    list-style: none;
    display: flex;
    justify-content: center;
}

nav li {
    margin: 0 20px;
}

nav a {
    text-decoration: none;
    color: #ffffff;
    font-weight: bold;
}
nav{
    margin-top: 20px;
}
a:hover{
    color: #f07422;
}
footer {
    background-color: #d3e0c7;
    height: 50px;
    bottom: 0;
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 50px;
}
#cr{
    font-weight: bold;
    margin-top: 15px;
    color: rgb(0, 0, 0);
    text-align: center;
} 
#city{
    margin-right: 325px;
}
#sex{
    margin-right: 145px;
}
</style>
<body>
    <!-- <nav>
        <ul>
            <li><a href="index.php">হোমপেজ</a></li>
                <li><a href="about.php" target="_blank">আমাদের সম্পর্কে</a></li>
                <li><a href="service.php" target="_blank">আমাদের সেবা</a></li>
                <li><a href="#" target="_blank">যোগাযোগ</a></li>
                <li><a href="#" target="_blank">উপকারী সংজুক</a></li>
        </ul>
    </nav> -->
    <div class="container">
        <div class="left-section">
            <h1>ফসল</h1>
            <p>কৃষিতে আপনার বিশ্বস্ত অংশীদার</p>
        </div>
        <div class="right-section">
            <h2>নিবন্ধন সম্পূর্ণ করুন</h2>
            <form action="signup.php" method="post">
                <div class="form-group">
                    <label for="firstName">নামের প্রথম অংশ:</label>
                    <input type="text" id="firstName" name="first_name" placeholder="নামের প্রথম অংশ" required>
                </div>
                <div class="form-group">
                    <label for="lastName">নামের শেষাংশ:</label>
                    <input type="text" id="lastName" name="last_name" placeholder="নামের শেষাংশ" required>
                </div>
                <div class="form-group">
                    <label for="mobileNumber">মোবাইল নম্বর:</label>
                    <input type="tel" id="mobileNumber" name="mobile_number" placeholder="মোবাইল নম্বর" required>
                </div>
                    <div class="form-group">
                        <label  for="sex">লিঙ্গ:</label><br>
                        <select id="sex" name="sex" required>
                            <option value="male" selected>পুরুষ</option>
                            <option value="female">মহিলা</option>
                            <option value="other">অন্যান্য</option>
                        </select><br>
                    </div>
                    <div>
                        <label id="city" for="city">শহর নির্বাচন:</label>
                        <select placeholder="Enter City" name="city" required name="city">
                            <option value="Dhaka" selected>ঢাকা</option>
                            <option value="Sylhet">সিলেট</option>
                            <option value="Barisal">বরিশাল</option>
                            <option value="Rangpur">রংপুর</option>
                            <option value="Chittagong">চট্টগ্রাম</option>
                            <option value="Khulna">খুলনা</option>
                            <option value="Rajshahi">রাজশাহী</option>
                            <option value="Mymensign">ময়মনসিংহ</option>
                        </select><br>
                    </div><br>
                    <div class="form-group">
                        <label for="birthDate">জন্ম তারিখ:</label>
                        <input type="date" id="birthDate" name="birth_date" placeholder="জন্ম তারিখ" required>
                    </div>

                    <div class="form-group">
                        <label for="email">ইমেইল:</label>
                        <input type="email" id="email" name="email" placeholder="ইমেইল" required>
                    </div>
                    <div class="form-group">
                        <label for="password">পাসওয়ার্ড:</label>
                        <input type="password" id="password" name="pw" placeholder="পাসওয়ার্ড" required>
                    </div>
                    <br>
                    <button type="submit" class="btn" name="save">নিবন্ধন করুন</button>
                    <div class="signup-prompt">
                        <p>ইতিমধ্যে একটি সদস্যপদ আছে? <a href="login.php" target="_blank">প্রবেশ করুন</a></p>
                    </div>
                </form>
        </div>
    </div>

    </div>

    <footer>
        <p id="cr">&copy; 2023 ফসল</p>
    </footer>

</body>

</html>