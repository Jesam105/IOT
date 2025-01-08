<?php
session_start();
include("config.php");

if(isset($_POST['submit'])){
    // Retrieve the form data
    $heartRate = $_POST['heartRate'];
    $rateCategory = $_POST['rateCategory'];
    // $date = $_POST['date'];
    // $time = $_POST['time'];

    // Prepare SQL statement to insert data into the table
    $stmt = $conn->prepare("INSERT INTO user_data (heartRate, rateCategory) VALUES ('$heartRate', '$rateCategory')");
    
    // Bind parameters and execute the statement
    $stmt->bind_param("ss", $heartRate, $rateCategory);
    $stmt->execute();

    // Check if data was inserted successfully
    if ($stmt->affected_rows > 0) {
        // Data saved successfully
        http_response_code(200);
    } else {
        // Failed to save data
        http_response_code(500);
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Invalid request
    http_response_code(400);
}
?>
