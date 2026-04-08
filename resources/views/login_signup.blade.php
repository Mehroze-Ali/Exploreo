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
            display: none; /* JS toggles. Server errors shown via block */
        }
        .server-error {
             display: block;
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
            display: none;
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
            
            <div id="signupForm" class="form-container" style="{{ (session('active_form') == 'login') ? 'display: none;' : '' }}">
                <h2 class="mb-4">Sign Up</h2>

                @if($errors->any() && session('active_form') != 'login')
                    <div class="alert-error-bar text-center">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form id="formSignup" method="POST" action="{{ route('signup.post') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control-custom" id="signupName" name="signupName" placeholder="Your Name" data-error-target="#errorName" value="{{ old('signupName') }}" />
                        <div id="errorName" class="error-message"></div>
                        @error('signupName') <div class="error-message server-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control-custom" id="signupEmail" name="signupEmail" placeholder="Your Email" data-error-target="#errorEmail" value="{{ old('signupEmail') }}" />
                        <div id="errorEmail" class="error-message"></div>
                         @error('signupEmail') <div class="error-message server-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <input type="password" class="form-control-custom" id="signupPassword" name="signupPassword" placeholder="Create Password" data-error-target="#errorPassword" />
                        <div id="errorPassword" class="error-message"></div>
                         @error('signupPassword') <div class="error-message server-error">{{ $message }}</div> @enderror
                        
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
                         @error('signupRepeatPassword') <div class="error-message server-error">{{ $message }}</div> @enderror
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

            <div id="loginForm" class="form-container" style="{{ (session('active_form') != 'login') ? 'display: none;' : '' }}">
                <h2 class="mb-4">Log In</h2>
                
                @if($errors->has('login_error'))
                    <div class="alert-error-bar text-center">
                        {{ $errors->first('login_error') }}
                    </div>
                @endif
                <!-- Also show other Validation errors in Login if they exist -->
                 @if($errors->any() && session('active_form') == 'login' && !$errors->has('login_error'))
                    <div class="alert-error-bar text-center">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form id="formLogin" method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="email" class="form-control-custom" id="loginEmail" name="loginEmail" placeholder="Your Email" data-error-target="#errorLoginEmail" value="{{ old('loginEmail') }}" />
                        <div id="errorLoginEmail" class="error-message"></div>
                         @error('loginEmail') <div class="error-message server-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <input type="password" class="form-control-custom" id="loginPassword" name="loginPassword" placeholder="Your Password" data-error-target="#errorLoginPassword" />
                        <div id="errorLoginPassword" class="error-message"></div>
                         @error('loginPassword') <div class="error-message server-error">{{ $message }}</div> @enderror
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
      // The exact same JS logic from legacy, adapted slightly to not interfere with server errors if needed
      // ... I will copy the JS from login-signup.php lines 416-557 ...
      
      // --- Helper: Validate if Field is Empty ---
      function validateInput(inputElement, errorMessage) {
        const $input = $(inputElement);
        const $errorTarget = $($input.data("error-target"));
        // Remove server error if user types
        $input.siblings('.server-error').hide();

        if ($input.val().trim() === "") {
          $errorTarget.text(errorMessage).slideDown(150);
          return false;
        } else {
          $errorTarget.slideUp(150).text("");
          return true;
        }
      }

      function validateStrongPassword(password) {
        // 1 Capital, 1 Symbol, 1 Number, Min 8 Chars
        const regex = /^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
        return regex.test(password);
      }

      function handleValidation(formType) {
        let isValid = true;

        if (formType === "signup") {
          const nameValid = validateInput("#signupName", "Name is required.");
          const emailValid = validateInput("#signupEmail", "Email is required.");
          const passwordVal = $("#signupPassword").val();
          
          let passValid = validateInput("#signupPassword", "Password is required.");
          
          if (passValid && !validateStrongPassword(passwordVal)) {
            $("#errorPassword").text("Password must contain 8+ chars, 1 Uppercase, 1 Number, and 1 Symbol.").slideDown(150);
            passValid = false;
          }

          const repeatPassValid = validateInput("#signupRepeatPassword", "Confirm password is required.");
          if (!nameValid || !emailValid || !passValid || !repeatPassValid) {
            isValid = false;
          }

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

      function checkStrength(password) {
          let strength = 0;
          if (password.length > 7) strength++;
          if (password.match(/[a-z]+/)) strength++;
          if (password.match(/[0-9]+/)) strength++;
          if (password.match(/[A-Z]+/)) strength++;
          if (password.match(/[\W_]+/)) strength++; 

          if (password.length < 1) strength = 0;

          const $bar = $("#strengthBarFill");
          const $text = $("#strengthText");
          let color = "#ff5555"; 
          let width = "0%";
          let message = "";

          switch (strength) {
              case 0: width="0%"; message=""; break;
              case 1: width="20%"; color="#ff5555"; message="Very Weak"; break;
              case 2: width="40%"; color="#ff5555"; message="Weak"; break;
              case 3: width="60%"; color="#ffbb33"; message="Medium"; break; 
              case 4: width="80%"; color="#00C851"; message="Strong"; break; 
              case 5: width="100%"; color="#007E33"; message="Very Strong"; break; 
          }

          $bar.css({ "width": width, "background-color": color });
          $text.text(message).css("color", color);
      }

      $(document).ready(function () {
        // Initial Active Form from Server is handled by PHP style injection.
        // Client side toggle:
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

        $("#signupPassword").on("input", function() {
            const val = $(this).val();
            if(val.length > 0) {
                $("#passwordStrengthArea").slideDown(200);
            } else {
                $("#passwordStrengthArea").slideUp(200);
            }
            checkStrength(val);
        });

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
