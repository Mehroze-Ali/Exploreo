<?php
require_once "connection.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Sanitize Input
    $name = filter_input(INPUT_POST, 'contactName', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'contactEmail', FILTER_SANITIZE_EMAIL);
    $phone = filter_input(INPUT_POST, 'contactPhone', FILTER_SANITIZE_STRING);
    $subject = filter_input(INPUT_POST, 'contactSubject', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'contactMessage', FILTER_SANITIZE_STRING);

    // 2. Prepare SQL
    $sql = "INSERT INTO contact (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)";
    
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $phone, $subject, $message);

        // 3. Execute and Redirect
        if (mysqli_stmt_execute($stmt)) {
            // Success: Go to loading screen
            header("Location: loading_screens/contact_loading.php?status=success");
            exit;
        } else {
            // Error: Go to loading screen with error flag
            header("Location: loading_screens/contact_loading.php?status=error");
            exit;
        }
        mysqli_stmt_close($stmt);
    } else {
        // Database Error
        header("Location: loading_screens/contact_loading.php?status=error");
        exit;
    }
} else {
    // Invalid access
    header("Location: contact.html");
    exit;
}

mysqli_close($conn);
?>