<?php
include 'dbconnect.php';
session_start();

$email = $_SESSION['user_data']['email'];

$sql = "SELECT first_name, last_name FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $Name = $row["first_name"] . ' ' . $row["last_name"];
    }
} else {
    echo "No results for the current user";
}

$productSql = "SELECT img_src, item_name, price FROM products";
$productResult = $conn->query($productSql);

$productData = [];

if ($productResult->num_rows > 0) {

    while ($productRow = $productResult->fetch_assoc()) {
        $productData[] = $productRow;
    }
} else {
    echo "No products found in the database";
}

if (isset($_POST['favorite']) && isset($_POST['img_src']) && isset($_POST['item_name']) && isset($_POST['price']) ) {

    $img_src = $_POST['img_src'];
    $item_name = $conn->real_escape_string($_POST['item_name']);
    $price = $_POST['price'];

    $checkQuery = "SELECT * FROM fav_prod WHERE img_src = '$img_src' AND user_email = '$email'";
    $checkResult = $conn->query($checkQuery);
    
    if ($checkResult->num_rows > 0) {
        echo '<script>alert("Product already added to cart.");</script>';
    } else {

        $insertQuery = "INSERT INTO fav_prod (img_src, item_name, price, user_email) VALUES ('$img_src', '$item_name', $price, '$email')";
        $result = $conn->query($insertQuery);
        
        if ($result) {
            echo '<script>alert("Product added to cart.");</script>';
        } else {
            echo '<script>alert("Failed to add product to cart");</script>';
    }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Fosol Homepage</title>
</head>
<style>
    body,
    h1,
    h2,
    p {
        padding: 0;
    }

    body {
        font-family: Arial, sans-serif;
    }

    header {
        background-color: #DDFFBB;
        color: black;
        padding: 20px 0;
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

    #voiceButton {
        background-color: #333;
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
    }
    #voiceButton:hover{
        background-color: #f07422;
    }
    .search-form button {
        background-color: #333;
        color: #ffff;
        border: none;
        padding: 10px 15px;
        cursor: pointer;
    }

    #title {
        text-align: center;
    }

    .btn {
        display: inline-block;
        padding: 10px;
        background-color: #f2a154;
        color: #fff;
        text-decoration: none;
        font-weight: bold;
        border-radius: 10px;
        margin-top: 0px;
        margin-left: 10px;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #f07422;
    }

    a:hover {
        color: #f07422;
    }

    footer {
        background-color: #2e4d1d;
        color: #fff;
        text-align: center;
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 40px;
        margin-top: 10px;
    }

    .product-card {
            transition: transform 0.2s, box-shadow 0.2s;
            border-radius: 2.5rem;
            padding: 2.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.25) !important;
            height: 400px !important;
        }

        .product-card:hover {
            transform: translateY(-10px);
            
        }
        .products h5.card-title {
            font-weight: 600;
        }

        .products p.card-text {
            font-size: 1rem;
            font-weight: 500;
        }

        .price-section {
            display: flex;
            align-items: center;
            justify-content: center;
            /* This will horizontally center the children */
            gap: 0.5rem;
        }

        .product-price {
            font-size: 1rem;
            font-weight: 500;
        }

        .fas.fa-money-bill-wave {
            font-size: 1.2rem;
            color: green;
            /* or any other color you prefer */
        }

        .card-body {
            display: flex;
            flex-direction: column;
            /* stack child elements vertically */
            justify-content: space-between;
            /* evenly distribute available space between children */
        }

        .product-card {
            position: relative;
        }

        .icon-btn {
            color: #ffffff;
            background-color: #000000;
            padding: 5px;
            display: inline-block;
            text-align: center;
            border-radius: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
            margin-left: 20px;
            width: 100%;
            font-size: 0.7rem;
            margin-top: 1.5rem;
            border: none;
        }

        .icon-btn i {
            display: block;
            /* This makes the icon appear above the text */
            margin-bottom: 2px;
            /* Space between the icon and the text */
            font-size: 1rem;
        }

        .icon-btn:hover {
            background-color: #A4BC92;
            /* Darker gray on hover */
        }

        .icon-btn:hover,
        .icon-btn:hover i {
            color: #ffffff;
            /* Keeps the text and the icon white on hover */
            text-decoration: none;
        }
        
        #ttl{
            text-align: center;
            padding-top: 10px;
            font-weight: bold;
        }
        .product-card img{
            border-radius: 1.5rem;
            width: 100%;
            height: 8rem;
        }
        .voice-btn{
            margin-right: 4px;
        }
        .input-group-append :hover{
            background-color: #A4BC92 !important;
        }
</style>

<body>
    <header>
        <h1 id="title">ফসল</h1><br>
        <h3 style="text-align: center;">স্বাগতম, <?php echo $Name; ?></h3><br>
        <nav>
            <ul>
                <li><a href="homepage.php">হোমপেজ</a></li>
                <li><a href="about.php">আমাদের সম্পর্কে</a></li>
                <li><a href="service.php">আমাদের সেবা</a></li>
                
                <li><a href="user_profile.php">প্রোফাইল</a></li>
                <!-- <li><a href="feedback.php">প্রতিক্রিয়া জানান</a></li> -->
                <li><a href="https://weather-six-theta.vercel.app/?fbclid=IwAR02yOudHnHDnmagcdeuMwOPBkppIL_2s4s9v5CLYIn_XrnxryJpzPXVO6U">আবহাওয়ার পূর্বাভাস</a></li>
                
                <li><a href="disease_prediction.php">রোগ সনাক্তকরণ</a></li>
                                <li><a href="dev_info.php">নির্মাতা</a></li>
            </ul>
            
        </nav>
        <section class="hero text-center py-5">
        <div class="container">
            <div class="search-form mt-4">
                <div class="input-group mb-3">
                    <input type="text" id="userInput" name="query" class="form-control" placeholder="Search for a product...">
                    <div class="input-group-append voice-btn">
                        <button class="btn btn-dark" id="voiceButton" type="button" onclick="startVoiceInput()">
                            <i class="fas fa-microphone-alt"></i>
                        </button>
                    </div>
                    <div class="input-group-append ">
                        <button class="btn btn-dark" id="enterBtn" type="button" onclick="performSearch()">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div id="productList" class="mt-3"></div>
            </div>
    </section>

    </header>
    <h2 id="ttl">Browse Products</h2>
    <section class="products bg-light py-5">
    <div class="container">
        <div class="row">
            <?php foreach ($productData as $product) { ?>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="product-card card h-100 shadow-sm">
                        <img src="<?php echo $product['img_src']; ?>" alt="<?php echo $product['item_name']; ?>" class="card-img-top">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-3"><?php echo $product['item_name']; ?></h5>

                            <div class="bottom-section">
                                <div class="price-section mb-2">
                                    <i class="fas fa-money-bill-wave"></i>
                                    <span class="product-price"><?php echo $product['price']; ?>৳</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-5">

                                    <form action="homepage.php" method="post">
                                        <input type="hidden" name="img_src" value="<?php echo $product['img_src']; ?>">
                                        <input type="hidden" name="item_name" value="<?php echo $product['item_name']; ?>">
                                        <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                                        <button type="submit" name="favorite" title="Favorite" class="icon-btn">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                        কার্টে যোগ করুন
                                        </button>
                                    </form>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

    <footer>
        <p>&copy; 2023 ফসল.</p>
    </footer>

    <script>
        const voiceButton = document.getElementById('voiceButton');
        const searchInput = document.getElementById('userInput');

        let isListening = false;
        let recognition;

        // voice input
        function toggleVoiceRecognition() {
            if (!isListening) {
                isListening = true;
                searchInput.placeholder = 'Listening...';
                recognition = new webkitSpeechRecognition() || new SpeechRecognition();
                recognition.lang = 'en-US';

                recognition.onresult = function(event) {
                    const result = event.results[0][0].transcript;
                    searchInput.value = result;
                    isListening = false;
                    searchInput.placeholder = '';
                };

                recognition.onend = function() {
                    isListening = false;
                    searchInput.placeholder = '';
                };

                recognition.start();
                voiceButton.style.color = 'red';
            } else {
                isListening = false;
                searchInput.placeholder = '';
                recognition.stop();
            }
        }
        // Add click event listener to the voice button
        voiceButton.addEventListener('click', toggleVoiceRecognition);

        $(document).ready(function() {
            $("#userInput").on('keyup', function() {
                var query = $(this).val();
                if (query != '') {
                    $.ajax({
                        url: 'search.php',
                        method: 'POST',
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('#productList').fadeIn();
                            $('#productList').html(data);
                        }
                    });
                }
            });

            $(document).on('click', 'li', function() {
                $('#userInput').val($(this).text());
                $('#productList').fadeOut();
            });

            $("#enterBtn").click(function() {
                var query = $("#userInput").val();
                if (query != '') {
                    $.ajax({
                        url: 'search.php',
                        method: 'POST',
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('#productList').fadeIn();
                            $('#productList').html(data);
                        }
                    });
                }
            });
        });
    </script>

</body>

</html>