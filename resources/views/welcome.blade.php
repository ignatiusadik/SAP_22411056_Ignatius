<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - YourApp</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, rgb(192, 231, 241), rgb(77, 162, 236));
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border-radius: 10px;
        }

        .logo {
            width: 60px;
        }

        .form-label {
            font-weight: 600;
        }

        .form-text {
            color: #6c757d;
        }

        .btn-primary {
            border-radius: 10px;
        }

        .text-small {
            font-size: 0.875rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 col-lg-5">
                <div class="card p-4">
                    <div class="text-center mb-4">
                        <img src="{{url('images/logo.png')}}" width="250" height="80" alt="logo">
                        <p class="text-muted text-small">Please sign in to your account</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <div class="input-group">
                                <span class="input-group-text"><i data-feather="mail"></i></span>
                                <input type="email" class="form-control" name="email" id="email" required autofocus>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i data-feather="lock"></i></span>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                        </div>
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember">
                                <label class="form-check-label text-small" for="remember">Keep me signed in</label>
                            </div>
                            <a href="#" class="text-decoration-none text-small text-primary">Forgot password?</a>
                        </div>
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">Sign In</button>
                        </div>
                        <div class="text-center text-small">
                            Don't have an account? <a href="{{ route('register') }}" class="text-primary text-decoration-none">Create</a>
                        </div>
                    </form>
                </div>
                <p class="text-center text-white-50 mt-4 mb-0 text-small">
                    &copy; {{ date('Y') }} YourApp. All rights reserved.
                </p>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS & Feather Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        feather.replace();
    </script>
</body>

</html>