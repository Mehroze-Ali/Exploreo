<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Wanderlust</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #052659;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
        }
        .login-card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 400px;
        }
        .login-card h3 {
            color: #052659;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 700;
        }
        .form-control {
            border-radius: 10px;
            padding: 12px;
        }
        .btn-custom {
            background-color: #052659;
            color: white;
            padding: 12px;
            border-radius: 10px;
            width: 100%;
            font-weight: 600;
            margin-top: 10px;
        }
        .btn-custom:hover {
            background-color: #021024;
            color: white;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h3>Admin Login</h3>
        
        @if(session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="admin@travel.com">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="********">
            </div>
            <button type="submit" class="btn btn-custom">Login to Dashboard</button>
        </form>
        <div class="text-center mt-3">
            <a href="{{ url('/') }}" class="text-decoration-none small text-muted">Back to Website</a>
        </div>
    </div>
</body>
</html>
