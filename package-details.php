<?php
// CRITICAL: Start the session if you are tracking login state
// session_start(); 

require_once "connection.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve input
    $full_name = filter_input(INPUT_POST, 'fullName', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $travelers = filter_input(INPUT_POST, 'travelers', FILTER_SANITIZE_NUMBER_INT);
    $start_date = $_POST['startDate']; 
    $special_requests = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
    $package_id = filter_input(INPUT_POST, 'packageId', FILTER_SANITIZE_STRING); // Must retrieve package ID

    // Use prepared statements to prevent SQL Injection
    $sql = "INSERT INTO bookings (full_name, email, phone, travelers, start_date, special_requests, package_id)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssisss", $full_name, $email, $phone, $travelers, $start_date, $special_requests, $package_id);

        if(mysqli_stmt_execute($stmt)){
            
            // --- SUCCESS: Redirect immediately to the loading screen ---
            // Pass the status and the original packageId so the frontend knows where to return.
            $redirect_url = "loading_screens/booking_loading.php?status=success&id=" . urlencode($package_id);
            header("Location: " . $redirect_url);
            exit; 
            
        } else {
            // --- ERROR: Redirect to loading screen with error status ---
            $redirect_url = "loading_screens/booking_loading.php?status=error&id=" . urlencode($package_id);
            header("Location: " . $redirect_url);
            exit; 
        }
        mysqli_stmt_close($stmt);
    } else {
        // Database preparation error should also trigger an error page
        $redirect_url = "loading_screens/booking_loading.php?status=error&id=" . urlencode($package_id);
        header("Location: " . $redirect_url);
        exit; 
    }

} else {
    // Redirect if accessed directly
    header("Location: ../index.html");
}

mysqli_close($conn);
?>