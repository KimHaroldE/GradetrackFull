<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GradeTrack - Login</title>
    <link rel="icon" href="{{ asset('images/logo1.png') }}" type="image/png">
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-auto">
                    <span class="text-white">Don't have an account? <a href="{{ route('signup') }}" class="text-white fw-bold text-decoration-none">Sign Up</a></span>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Main content -->
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <!-- Logo -->
                <div class="text-center mb-4">
                    <img src="{{ asset('images/logo1.png') }}" alt="GradeTrack Logo" class="logo">
                </div>
               @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                <!-- Login Form -->
                <div class="login-card card shadow p-4">
                    <div class="card-body">
                        <h2 class="text-white fw-bold text-center mb-4">Log In</h2>
                        <form action="{{ route('login.submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" id="username" name="username" placeholder="username">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="password">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label text-white" for="rememberMe">Remember Me</label>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="footer-line"></div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>