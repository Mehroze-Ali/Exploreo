<?php
// 1. START SESSION
session_start();

// 2. INCLUDE DATABASE CONNECTION
if (file_exists("connection.php")) {
    require_once "connection.php";
} else {
    require_once "../connection.php"; 
}

// 3. INITIALIZE VARIABLES
$login_error = "";
$signup_error = "";
$active_form = "login"; 

// 4. HANDLE FORM SUBMISSIONS
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- HANDLE LOGIN ---
    if (isset($_POST['login_submit'])) {
        $active_form = "login"; 
        $email = filter_input(INPUT_POST, 'loginEmail', FILTER_SANITIZE_EMAIL);
        $password = $_POST['loginPassword'];

        $sql = "SELECT id, name, email, password FROM users WHERE email = ?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {
                $user = mysqli_fetch_assoc($result);
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['name'];
                    $_SESSION['logged_in'] = true;
                    header("Location: loading_screens/loading.php?name=" . urlencode($user['name']));
                    exit;
                } else {
                    $login_error = "Invalid email or password.";
                }
            } else {
                $login_error = "Invalid email or password.";
            }
            mysqli_stmt_close($stmt);
        } else {
            $login_error = "Database error. Please try again.";
        }
    }

    // --- HANDLE SIGNUP ---
    elseif (isset($_POST['signup_submit'])) {
        $active_form = "signup";

        $name = filter_input(INPUT_POST, 'signupName', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'signupEmail', FILTER_SANITIZE_EMAIL);
        $password = $_POST['signupPassword'];
        $repeatPassword = $_POST['signupRepeatPassword'];

        // Basic Validation
        if (empty($name) || empty($email) || empty($password) || empty($repeatPassword)) {
            $signup_error = "All fields are required.";
        } elseif ($password !== $repeatPassword) {
            $signup_error = "Passwords do not match.";
        } 
        // PASSWORD STRENGTH VALIDATION (Server Side)
        elseif (strlen($password) < 8 || 
                !preg_match("/[A-Z]/", $password) || 
                !preg_match("/[0-9]/", $password) || 
                !preg_match("/[\W_]/", $password)) {
            $signup_error = "Password must be 8+ chars with 1 uppercase, 1 number, and 1 symbol.";
        } 
        else {
            // Check if email exists
            $check_sql = "SELECT id FROM users WHERE email = ?";
            if ($stmt_check = mysqli_prepare($conn, $check_sql)) {
                mysqli_stmt_bind_param($stmt_check, "s", $email);
                mysqli_stmt_execute($stmt_check);
                mysqli_stmt_store_result($stmt_check);

                if (mysqli_stmt_num_rows($stmt_check) > 0) {
                    $signup_error = "This email address is already registered.";
                } else {
                    // Insert New User
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $insert_sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
                    
                    if ($stmt_insert = mysqli_prepare($conn, $insert_sql)) {
                        mysqli_stmt_bind_param($stmt_insert, "sss", $name, $email, $hashed_password);
                        
                        if (mysqli_stmt_execute($stmt_insert)) {
                            $_SESSION['user_id'] = mysqli_insert_id($conn);
                            $_SESSION['user_name'] = $name;
                            $_SESSION['logged_in'] = true;
                            header("Location: loading_screens/loading.php?name=" . urlencode($name));
                            exit;
                        } else {
                            $signup_error = "Registration failed. Please try again.";
                        }
                        mysqli_stmt_close($stmt_insert);
                    }
                }
                mysqli_stmt_close($stmt_check);
            }
        }
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Exploreo - Access Account</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <style>
        :root {
            --color-deep-navy: #021024;
            --color-dark-blue: #052659;
            --color-accent-green: #108754;
            --color-background-dark: #121c17;
            --color-text-light: #e0f0f8;
            --color-input-border: #333;
            --form-padding: 50px;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--color-background-dark);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            position: relative;
            overflow: hidden;
        }
        .background-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("https://picsum.photos/seed/dark-tropical-bg/1920/1080");
            background-size: cover;
            background-position: center;
            filter: brightness(0.4) grayscale(0.5);
            z-index: -2;
        }
        .login-signup-box {
            display: flex;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
            max-width: 950px;
            width: 90%;
            min-height: 550px;
            overflow: hidden;
        }
        .left-panel {
            padding: var(--form-padding);
            width: 45%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: var(--color-text-light);
            position: relative;
            z-index: 1;
            overflow: hidden;
        }
        .left-panel::before {
            content: "";
            position: absolute;
            top: -20px;
            left: -20px;
            right: -20px;
            bottom: -20px;
            background-image: url("https://picsum.photos/seed/dark-tropical-bg/1920/1080");
            background-size: cover;
            background-position: center;
            filter: brightness(0.4) grayscale(0.5) blur(10px);
            z-index: -1;
        }
        .left-panel h1, .left-panel p {
            position: relative;
            z-index: 2;
        }
        .right-panel {
            background-color: var(--color-deep-navy);
            padding: var(--form-padding);
            width: 55%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: white;
            z-index: 1;
        }
        .form-control-custom {
            background: none;
            border: none;
            border-bottom: 1px solid var(--color-input-border);
            color: var(--color-text-light);
            border-radius: 0;
            padding: 10px;
            width: 100%;
            box-shadow: none !important;
            transition: border-bottom 0.2s;
            font-size: 1.1rem;
        }
        .form-control-custom:focus {
            border-bottom: 1px solid var(--color-accent-green);
            background: none;
        }
        .form-control-custom::placeholder {
            color: rgba(255, 255, 255, 0.5);
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
            margin-top: 15px;
        }
        .btn-green-submit:hover {
            background-color: #0b683e;
            color: white;
        }
        .toggle-link {
            color: var(--color-accent-green);
            cursor: pointer;
            text-decoration: none;
            font-weight: 600;
        }
        .error-message {
            color: #ff5555;
            font-size: 0.8rem;
            margin-top: 5px;
            margin-bottom: 5px;
            display: none;
        }
        .alert-error-bar {
            background-color: #581515;
            border: 1px solid #ff5555;
            color: #ffcccc;
            padding: 10px;
            border-radius: 5px;
            font-size: 0.9rem;
            margin-bottom: 20px;
            font-weight: 600;
        }

        /* --- Password Strength Bar Styles --- */
        .password-strength-area {
            margin-top: 5px;
            margin-bottom: 15px;
            display: none; /* Hidden until user types */
        }
        .strength-bar-bg {
            background-color: rgba(255,255,255,0.2);
            height: 5px;
            border-radius: 2px;
            overflow: hidden;
        }
        .strength-bar-fill {
            height: 100%;
            width: 0%;
            background-color: #ff5555;
            transition: width 0.3s, background-color 0.3s;
        }
        .strength-text {
            color: #ccc;
            font-size: 0.75rem;
            margin-top: 5px;
            text-align: right;
        }

        @media (max-width: 768px) {
            .login-signup-box {
                flex-direction: column;
                width: 95%;
                min-height: 90vh;
                max-width: 100%;
            }
            .left-panel, .right-panel {
                width: 100%;
                padding: 30px;
            }
            .left-panel {
                min-height: 200px;
            }
            .left-panel::before {
                filter: brightness(0.4) grayscale(0.5) blur(5px);
            }
        }
    </style>
</head>
<body>
    <div class="background-overlay"></div>

    <div class="login-signup-box">
        <div class="left-panel">
            <h1>Let's Get Started</h1>
            <p>
                Maecenas placerat ultricies libero eu pharetra. Vestibulum a ultricies augue. Explore the world with Wanderlust Adventures.
            </p>
        </div>

        <div class="right-panel">
            
            <div id="signupForm" class="form-container">
                <h2 class="mb-4">Sign Up</h2>

                <?php if ($signup_error): ?>
                    <div class="alert-error-bar text-center">
                        <?php echo $signup_error; ?>
                    </div>
                <?php endif; ?>

                <form id="formSignup" method="POST" action="">
                    <input type="hidden" name="signup_submit" value="1">

                    <div class="mb-3">
                        <input type="text" class="form-control-custom" id="signupName" name="signupName" placeholder="Your Name" data-error-target="#errorName" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>" />
                        <div id="errorName" class="error-message"></div>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control-custom" id="signupEmail" name="signupEmail" placeholder="Your Email" data-error-target="#errorEmail" value="<?php echo isset($email) && $active_form == 'signup' ? htmlspecialchars($email) : ''; ?>" />
                        <div id="errorEmail" class="error-message"></div>
                    </div>

                    <div class="mb-3">
                        <input type="password" class="form-control-custom" id="signupPassword" name="signupPassword" placeholder="Create Password" data-error-target="#errorPassword" />
                        <div id="errorPassword" class="error-message"></div>
                        
                        <div class="password-strength-area" id="passwordStrengthArea">
                            <div class="strength-bar-bg">
                                <div class="strength-bar-fill" id="strengthBarFill"></div>
                            </div>
                            <div class="strength-text" id="strengthText">Weak</div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <input type="password" class="form-control-custom" id="signupRepeatPassword" name="signupRepeatPassword" placeholder="Repeat Password" data-error-target="#errorRepeatPassword" />
                        <div id="errorRepeatPassword" class="error-message"></div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-12">
                            <button type="submit" class="btn btn-green-submit w-100" id="btnSignup">
                                Sign Up
                            </button>
                        </div>
                    </div>

                    <p class="small mt-4 text-center">
                        Already a Member?
                        <a href="#" class="toggle-link" data-target="login">Sign in here</a>
                    </p>
                </form>
            </div>

            <div id="loginForm" class="form-container" style="display: none;">
                <h2 class="mb-4">Log In</h2>
                
                <?php if ($login_error): ?>
                    <div class="alert-error-bar text-center">
                        <?php echo $login_error; ?>
                    </div>
                <?php endif; ?>

                <form id="formLogin" method="POST" action="">
                    <input type="hidden" name="login_submit" value="1">

                    <div class="mb-3">
                        <input type="email" class="form-control-custom" id="loginEmail" name="loginEmail" placeholder="Your Email" data-error-target="#errorLoginEmail" value="<?php echo isset($email) && $active_form == 'login' ? htmlspecialchars($email) : ''; ?>" />
                        <div id="errorLoginEmail" class="error-message"></div>
                    </div>

                    <div class="mb-3">
                        <input type="password" class="form-control-custom" id="loginPassword" name="loginPassword" placeholder="Your Password" data-error-target="#errorLoginPassword" />
                        <div id="errorLoginPassword" class="error-message"></div>
                    </div>

                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <button type="submit" class="btn btn-green-submit w-100" id="btnLogin">
                                Log In
                            </button>
                        </div>
                    </div>

                    <p class="small mt-4 text-center">
                        Don't have an account?
                        <a href="#" class="toggle-link" data-target="signup">Sign up here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
      // --- Helper: Validate if Field is Empty ---
      function validateInput(inputElement, errorMessage) {
        const $input = $(inputElement);
        const $errorTarget = $($input.data("error-target"));
        if ($input.val().trim() === "") {
          $errorTarget.text(errorMessage).slideDown(150);
          return false;
        } else {
          $errorTarget.slideUp(150).text("");
          return true;
        }
      }

      // --- Helper: Password Regex Check ---
      function validateStrongPassword(password) {
        // 1 Capital, 1 Symbol, 1 Number, Min 8 Chars
        const regex = /^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
        return regex.test(password);
      }

      // --- Main Form Validation Handler ---
      function handleValidation(formType) {
        let isValid = true;

        if (formType === "signup") {
          const nameValid = validateInput("#signupName", "Name is required.");
          const emailValid = validateInput("#signupEmail", "Email is  Not required.");
          const passwordVal = $("#signupPassword").val();
          
          // 1. Check if password empty
          let passValid = validateInput("#signupPassword", "Password is required.");
          
          // 2. If not empty, check strength rules
          if (passValid && !validateStrongPassword(passwordVal)) {
            $("#errorPassword").text("Password must contain 8+ chars, 1 Uppercase, 1 Number, and 1 Symbol.").slideDown(150);
            passValid = false;
          }

          const repeatPassValid = validateInput("#signupRepeatPassword", "Confirm password is required.");
          if (!nameValid || !emailValid || !passValid || !repeatPassValid) {
            isValid = false;
          }

          // 3. Check password match
          if (isValid && passwordVal !== $("#signupRepeatPassword").val()) {
            $("#errorRepeatPassword").text("Passwords do not match.").slideDown(150);
            isValid = false;
          }

          if (isValid) return true;

        } else if (formType === "login") {
          const emailValid = validateInput("#loginEmail", "Email is required.");
          const passValid = validateInput("#loginPassword", "Password is required.");
          if (!emailValid || !passValid) isValid = false;
          if (isValid) return true;
        }

        return false;
      }

      // --- Password Strength Meter Logic ---
      function checkStrength(password) {
          let strength = 0;
          if (password.length > 7) strength++;
          if (password.match(/[a-z]+/)) strength++;
          if (password.match(/[0-9]+/)) strength++;
          if (password.match(/[A-Z]+/)) strength++;
          if (password.match(/[\W_]+/)) strength++; // Special char

          if (password.length < 1) strength = 0;

          const $bar = $("#strengthBarFill");
          const $text = $("#strengthText");
          let color = "#ff5555"; // Red
          let width = "0%";
          let message = "";

          switch (strength) {
              case 0: width="0%"; message=""; break;
              case 1: width="20%"; color="#ff5555"; message="Very Weak"; break;
              case 2: width="40%"; color="#ff5555"; message="Weak"; break;
              case 3: width="60%"; color="#ffbb33"; message="Medium"; break; // Orange
              case 4: width="80%"; color="#00C851"; message="Strong"; break; // Green
              case 5: width="100%"; color="#007E33"; message="Very Strong"; break; // Dark Green
          }

          $bar.css({ "width": width, "background-color": color });
          $text.text(message).css("color", color);
      }

      $(document).ready(function () {
        // --- Determine Initial Form View ---
        const activeForm = "<?php echo $active_form; ?>";
        if (activeForm === 'login') {
            $("#signupForm").hide();
            $("#loginForm").show();
        } else {
            $("#loginForm").hide();
            $("#signupForm").show();
        }

        // --- Panel Toggle ---
        $(".toggle-link").on("click", function (e) {
          e.preventDefault();
          const target = $(this).data("target");
          $(".error-message").slideUp(150).text(""); 
          $(".alert-error-bar").hide(); 

          if (target === "login") {
            $("#signupForm").slideUp(300);
            $("#loginForm").slideDown(300);
          } else if (target === "signup") {
            $("#loginForm").slideUp(300);
            $("#signupForm").slideDown(300);
          }
        });

        // --- Password Input Listener for Strength Meter ---
        $("#signupPassword").on("input", function() {
            const val = $(this).val();
            if(val.length > 0) {
                $("#passwordStrengthArea").slideDown(200);
            } else {
                $("#passwordStrengthArea").slideUp(200);
            }
            checkStrength(val);
        });

        // --- Form Submission Handlers ---
        $("#formSignup").on("submit", function (e) {
          if (!handleValidation("signup")) {
            e.preventDefault();
          }
        });

        $("#formLogin").on("submit", function (e) {
          if (!handleValidation("login")) {
            e.preventDefault();
          }
        });
      });
    </script>
</body>
</html>