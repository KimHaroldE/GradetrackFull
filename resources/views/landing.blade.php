<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GradeTrack</title>
    <link rel="icon" href="{{ asset('images/logo1.png') }}" type="image/png">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/landing.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <!-- Buttons -->
            <div class="d-flex ms-auto">
                <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Log in</a>
                <a href="{{ route('signup') }}" class="btn btn-outline-light">Sign up</a>
            </div>
        </div>
    </nav>
    
   
    <!-- Main Content -->
    
    <!--logo-->
    <div class="logo-container">
        <img src="{{ asset('images/logo1.png') }}" alt="GradeTrack Logo" class="logo">
    </div>

    <main class="content py-5">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-lg-9 text-start">
                    <div class="welcome-text">
                        <p class="fs-5 text-start">
                            We're excited to help you stay on top of your academic journey. With GradeTrack, you can easily input your grades and subjects, track your progress, and ensure you're always in the loop with how you're performing. Whether you're aiming for straight A's or simply keeping tabs on your progress, we've got your back!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>