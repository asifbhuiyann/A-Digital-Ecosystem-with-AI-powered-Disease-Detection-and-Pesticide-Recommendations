<?php
include 'dbconnect.php'; // Include your database connection file

// Check if the details are sent via POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch the content from the POST request
    $qr_details = $_POST['content'];

    // Check if the QR code details already exist in the database
    $stmt_check = $conn->prepare("SELECT id, scan_count FROM qr WHERE qr_details = ?");
    $stmt_check->bind_param("s", $qr_details);
    $stmt_check->execute();
    $stmt_check->store_result();

    // If the QR code details exist, update the scan count
    if ($stmt_check->num_rows > 0) {
        $stmt_check->bind_result($id, $scan_count);
        $stmt_check->fetch();

        // Update the scan count for the existing QR code details
        $scan_count++;
        $stmt_update = $conn->prepare("UPDATE qr SET scan_count = ? WHERE id = ?");
        $stmt_update->bind_param("ii", $scan_count, $id);
        $stmt_update->execute();
        $stmt_update->close();
    } else {
        // If the QR code details do not exist, insert a new record
        $stmt_insert = $conn->prepare("INSERT INTO qr (qr_details, scan_count) VALUES (?, 1)");
        $stmt_insert->bind_param("s", $qr_details);
        $stmt_insert->execute();
        $stmt_insert->close();
    }

    // Close the statement
    $stmt_check->close();

    // Close the database connection
    $conn->close();

    // Echo a JavaScript alert to notify the user
    echo "<script>alert('Details saved.');</script>";
}
