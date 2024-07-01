<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ক্যামেরা চালু করুন</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: lightgreen;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        h1 {
            margin-bottom: 10px;
        }
        #turnOnCamera {
            border: none;
            background-color: transparent;
            cursor: pointer;
        }
        #turnOnCamera i {
            font-size: 24px;
            color: black;
        }
    </style>
</head>

<body>
    <h1>রোগ সনাক্তকরণ</h1>
    <button id="turnOnCamera">
        <i class="fas fa-camera"></i>
    </button>

    <video id="cameraStream" autoplay muted></video>

    <script>
        document.getElementById("turnOnCamera").addEventListener("click", function() {
            navigator.mediaDevices.getUserMedia({
                    video: true
                })
                .then(function(stream) {
                    var video = document.getElementById("cameraStream");
                    video.srcObject = stream;
                    video.play();
                })
                .catch(function(error) {
                    console.error("Error accessing camera:", error);
                    alert("Failed to access camera. Please ensure you have granted permission.");
                });
        });
    </script>
</body>

</html>