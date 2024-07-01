<?php include 'dbconnect.php';

session_start();

if (isset($_SESSION['email'])) {

    $_SESSION = array();

    session_destroy();

    header("Location: admin.php");
    exit();
} else {
    header("Location: admin.php");
    exit();
}
