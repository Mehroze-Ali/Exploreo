<?php
// --- This script is accessed by the contact_submission.php redirect ---

// Retrieve parameters from URL
$status = isset($_GET['status']) ? htmlspecialchars($_GET['status']) : 'error';
$packageId = null; // Package ID is not relevant here, but keeping it for consistency

// Set the title/message based on status
if ($status == 'success') {
    $title = "Message Sent!";
    $message = "Your message has been sent successfully! We will contact you soon.";
    $color_class = 'text-success-styled';
    $icon = '<i class="fas fa-check-circle success-icon"></i>';
} else {
    $title = "Submission Failed!";
    $message = "There was an error processing your request. Please check your inputs.";
    $color_class = 'text-danger';
    $icon = '<i class="fas fa-times-circle error-icon"></i>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        /* Styles for the loading spinner (Matching your website theme) */
        :root {
            --color-deep-navy: #021024;
            --color-dark-blue: #052659;
            --color-accent-green: #108754; 
            --color-background-dark: #121c17;
            --color-text-light: #e0f0f8;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--color-background-dark);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            overflow: hidden;
            color: var(--color-text-light);
        }

        .loading-screen {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            width: 100%;
            height: 100%;
        }

        /* --- Custom Confirmation Card Styles --- */
        .confirmation-card {
            background-color: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            max-width: 450px;
            width: 90%;
            color: var(--color-deep-navy);
            animation: fadeInScale 0.5s ease-out;
            
            /* Initially hidden, shown after spinner runs */
            display: none; 
        }

        .success-icon {
            font-size: 3.5rem;
            color: var(--color-accent-green);
            margin-bottom: 15px;
            animation: bounce 1s ease-in-out;
        }
        .error-icon {
            font-size: 3.5rem;
            color: #dc3545; /* Bootstrap Red */
            margin-bottom: 15px;
        }
        
        .confirmation-card h3 {
            color: var(--color-dark-blue);
            font-weight: 700;
        }

        .confirmation-card p {
            color: #555;
            opacity: 1;
            font-size: 1rem;
            margin-bottom: 20px;
        }
        
        .confirmation-card .btn-ok {
            background-color: var(--color-dark-blue);
            color: white;
            padding: 10px 30px;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.2s;
            border: none;
            cursor: pointer;
        }
        .confirmation-card .btn-ok:hover {
            background-color: var(--color-medium-blue);
        }

        @keyframes fadeInScale {
            0% { opacity: 0; transform: scale(0.9); }
            100% { opacity: 1; transform: scale(1); }
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
            40% {transform: translateY(-10px);}
            60% {transform: translateY(-5px);}
        }

        /* --- Spinner Styles (Initial view) --- */
        .loading-content-box { 
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        
        .spinner-wrapper {
            position: relative;
            width: 100px;
            height: 100px;
            margin: 0 auto 10px auto; 
        }
        
        .spinner-outer, .spinner-inner {
            border: 5px solid transparent;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .spinner-outer {
            width: 100px;
            height: 100px;
            border-top-color: var(--color-accent-green); 
            border-right-color: var(--color-accent-green);
            animation: spin 1.5s linear infinite;
        }

        .spinner-inner {
            width: 70px;
            height: 70px;
            border-bottom-color: var(--color-dark-blue); 
            border-left-color: var(--color-dark-blue);
            animation: spin-reverse 1.2s linear infinite;
        }

        .spinner-dot {
            width: 10px;
            height: 10px;
            background-color: var(--color-accent-green);
            border-radius: 50%;
            position: absolute;
            top: 0px; 
            left: 50%;
            z-index: 10; 
            animation: dot-rotate 1.5s linear infinite; 
            transform-origin: 50% 50px; 
            margin-top: -5px; 
        }

        @keyframes spin {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }

        @keyframes spin-reverse {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(-360deg); }
        }

        @keyframes dot-rotate {
            0% { transform: translateX(-50%) rotate(0deg) translateY(-45px) rotate(0deg); } 
            100% { transform: translateX(-50%) rotate(360deg) translateY(-45px) rotate(-360deg); } 
        }
    </style>
</head>
<body>
    <div class="loading-screen">
        
        <!-- 1. Initial Spinner/Loading Message -->
        <div id="loadingSpinner" class="loading-content-box">
            
            <div class="spinner-wrapper">
                <div class="spinner-container">
                    <div class="spinner-outer"></div>
                    <div class="spinner-inner"></div>
                    <div class="spinner-dot"></div>
                </div>
            </div>
            
            <div class="loading-text-container">
                <h3>Processing Message...</h3> 
                <p>Please wait while your inquiry is confirmed.</p>
            </div>
        </div>

        <!-- 2. Hidden Confirmation Card (Shown after 2 seconds) -->
        <div id="confirmationMessage" class="confirmation-card">
            <?php echo $icon; ?>
            <h3 class="text-dark-blue"><?php echo $title; ?></h3>
            <p><?php echo $message; ?></p>
            <button class="btn-ok" onclick="redirectToDetails()">OK</button>
        </div>

    </div>

    <script>
        // Set variables globally to be used by JS functions
        const submissionStatus = '<?php echo $status; ?>';
        
        // Function to handle final redirection
        function redirectToDetails() {
            // CRITICAL: Save the result status to sessionStorage for contact.html to read
            sessionStorage.setItem('contactSubmissionStatus', submissionStatus);
            
            // Redirect back to the original contact page
            window.location.href = '../contact.html';
        }

        // 1. Show spinner for 2 seconds
        setTimeout(function() {
            // 2. Hide spinner and show the confirmation card
            document.getElementById('loadingSpinner').style.display = 'none';
            document.getElementById('confirmationMessage').style.display = 'block';
            
        }, 2000); // 2 second delay for spinner
    </script>
</body>
</html>