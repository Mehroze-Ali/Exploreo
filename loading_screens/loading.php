<?php
// Start session management if you plan to use sessions later
session_start();

// Retrieve the 'name' parameter from the URL, which was set in login.php
// We ensure it is URL decoded and sanitized before outputting to HTML/JS.
$userName = isset($_GET['name']) ? htmlspecialchars(urldecode($_GET['name'])) : 'Explorer';

// NOTE: If you are using PHP sessions for security (recommended), 
// you would typically set the session variables in login.php. 
// We use the passed query parameter here primarily to quickly set the client-side localStorage.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Successful</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        /* Color Palette Integration (Matching your website theme) */
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
        }

        .spinner-container {
            position: relative;
            width: 100px;
            height: 100px;
            margin-bottom: 20px;
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
            transform: translateX(-50%);
            z-index: 10; 
            animation: dot-rotate 1.5s linear infinite; 
            transform-origin: 50% 50px; 
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
            0% { transform: translateX(-50%) rotate(0deg) translateY(-50px) rotate(0deg); }
            100% { transform: translateX(-50%) rotate(360deg) translateY(-50px) rotate(-360deg); }
        }

        h3 {
            font-weight: 600;
            margin-top: 10px;
            color: var(--color-text-light);
        }

        p {
            font-size: 0.9rem;
            opacity: 0.8;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="loading-screen">
        <div class="spinner-container">
            <div class="spinner-outer"></div>
            <div class="spinner-inner"></div>
            <div class="spinner-dot"></div>
        </div>
        <h3>Login Successful!</h3>
        <p>Preparing dashboard for <?php echo $userName; ?>...</p>
    </div>

    <script>
        // CRITICAL: Set the localStorage key using the username retrieved by PHP.
        const userName = "<?php echo $userName; ?>";
        if (userName && userName !== 'Explorer') {
            localStorage.setItem('userName', userName);
        }
        
        // Redirect to the main page after 1 second (1000 milliseconds)
        setTimeout(function() {
            window.location.href = '../index.html';
        }, 1000); 
    </script>
</body>
</html>