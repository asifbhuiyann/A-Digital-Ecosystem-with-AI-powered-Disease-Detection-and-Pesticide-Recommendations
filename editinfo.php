<?php
include 'dbconnect.php';

$sql = "SELECT email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $Email = $row["email"];
    }
} else {
    echo "0 results";
}

if (isset($_POST['update'])) {
    // Get the user's name and email address
    $new_first_name = $_POST["new_first_name"];
    $new_last_name = $_POST["new_last_name"];
    $new_mobile_number = $_POST["new_mobile_number"];
    $new_sex = $_POST["new_sex"];
    $new_city = $_POST["new_city"];
    $new_birth_date = $_POST["new_birth_date"];

    // Save the user's data to the database
    $sql = "UPDATE users SET first_name='$new_first_name', last_name='$new_last_name', mobile_number='$new_mobile_number', sex='$new_sex', city='$new_city', birth_date='$new_birth_date' WHERE email='$Email'";
    if ($conn->query($sql) === TRUE) {
        $message = "Information Successfully Updated";
    } else {
        echo "Error Updating Information: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fc;
        }

        .custom-form {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<?php include 'nav.php'; ?>
<body>
    <div class="container">

        <div class="custom-form">
            <form method="post" action="editinfo.php">
            <h2 class="text-center mb-4">Update Personal Details</h2>
                <div class="form-group">
                    <label for="first_name">নামের প্রথম অংশ:</label>
                    <input type="text" class="form-control" id="first_name" name="new_first_name" required>
                </div>

                <div class="form-group">
                    <label for="last_name">নামের শেষাংশ:</label>
                    <input type="text" class="form-control" id="last_name" name="new_last_name" required>
                </div>

                <div class="form-group">
                    <label for="mobile_number">মোবাইল নম্বর:</label>
                    <input type="tel" class="form-control" id="mobile_number" name="new_mobile_number" required>
                </div>

                <div class="form-group">
                    <label for="sex">লিঙ্গ:</label>
                    <select class="form-control" id="sex" name="new_sex" required>
                            <option value="male" selected>পুরুষ</option>
                            <option value="female">মহিলা</option>
                            <option value="other">অন্যান্য</option>
                    </select>
                </div>
                <div class="form-group">
                <label id="city" for="city">শহর নির্বাচন:</label><br>
                        <select placeholder="Enter City" name="new_city" required name="city">
                            <option value="Dhaka" selected>ঢাকা</option>
                            <option value="Sylhet">সিলেট</option>
                            <option value="Barisal">বরিশাল</option>
                            <option value="Rangpur">রংপুর</option>
                            <option value="Chittagong">চট্টগ্রাম</option>
                            <option value="Khulna">খুলনা</option>
                            <option value="Rajshahi">রাজশাহী</option>
                            <option value="Mymensign">ময়মনসিংহ</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="birth_date">জন্ম তারিখ:</label>
                    <input type="date" class="form-control" id="birth_date" name="new_birth_date" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block" name="update">হালনাগাদ করুন</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        var message = "<?php echo $message; ?>";
        if (message) {
            alert(message);
        }
    </script>
</body>

</html>