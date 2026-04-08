<?php
session_start();

// --- HARDCODED ADMIN CREDENTIALS ---
$ADMIN_EMAIL = "admin@abc.com";
$ADMIN_PASSWORD = "123456";

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Check credentials
    if ($email === $ADMIN_EMAIL && $password === $ADMIN_PASSWORD) {
        
        // Login Successful: Set session variables
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['user_email'] = $email;

        // Redirect to the dashboard
        header("Location: admin_dashboard.php");
        exit;
    } else {
        $error_message = "Invalid administrator email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        :root {
            --color-deep-navy: #021024;
            --color-dark-blue: #052659;
            --color-accent-green: #108754; 
            --color-background-dark: #121c17;
            --color-text-light: #e0f0f8;
            --color-input-border: #333;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--color-dark-blue);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            color: white;
        }

        .login-card {
            background-color: var(--color-deep-navy);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            max-width: 400px;
            width: 90%;
        }

        .form-control-custom {
            background: none;
            border: none;
            border-bottom: 1px solid var(--color-input-border);
            color: var(--color-text-light);
            border-radius: 0;
            padding: 10px;
            box-shadow: none !important;
            transition: border-bottom 0.2s;
            width: 100%; 
            font-size: 1.1rem; 
        }
        .form-control-custom:focus {
            border-bottom: 1px solid var(--color-accent-green);
            background: none;
        }

        .btn-green-submit {
            background-color: var(--color-accent-green);
            color: white;
            padding: 12px 20px;
            border-radius: 5px;
            font-weight: 600;
            transition: background-color 0.2s;
            border: none;
            width: 100%; 
            margin-top: 20px;
        }
        .btn-green-submit:hover {
            background-color: #0b683e;
        }
        .error-alert {
            color: #ff5555;
            font-weight: 600;
            margin-bottom: 15px;
        }

    </style>
</head>
<body>
    <div class="login-card">
        <h3 class="text-center mb-4"><i class="fas fa-lock me-2"></i> Admin Access</h3>
        
        <?php if ($error_message): ?>
            <p class="error-alert text-center"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <form method="POST" action="admin_login.php">
            <div class="mb-4">
                <input type="email" class="form-control-custom" name="email" placeholder="Admin Email" required>
            </div>
            
            <div class="mb-4">
                <input type="password" class="form-control-custom" name="password" placeholder="Password" required>
            </div>
            
            <button type="submit" class="btn btn-green-submit">Log In to Dashboard</button>
        </form>
    </div>
</body>
</html>