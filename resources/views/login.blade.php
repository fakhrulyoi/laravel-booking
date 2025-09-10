<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display:flex;
            align-items:center;
            justify-content:center;
            height:100vh;
            background: url('https://source.unsplash.com/1600x900/?studio,photography') center/cover no-repeat;
        }
        .login-card {
            background: rgba(255,255,255,0.9);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
            width: 350px;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h3 class="text-center mb-4">🔑 Admin Login</h3>

        @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif

        <form method="post" action="/login">
            @csrf
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
            </div>
            <button class="btn btn-dark w-100">Login</button>
        </form>
    </div>
</body>
</html>
