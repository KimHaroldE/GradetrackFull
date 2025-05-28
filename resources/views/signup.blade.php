<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GradeTrack - Sign Up</title>
    <link rel="icon" href="{{ asset('images/logo1.png') }}" type="image/png">
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{ asset('css/signup.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Logo -->
    <div class="logo-container">
        <a href="{{ route('landing') }}">
            <img src="{{ asset('images/logo1.png') }}" alt="GradeTrack Logo" class="logo">
        </a>
    </div>

    <!-- Header -->
    <header class="header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-auto">
                    <span class="text-white">Already have an account? 
                        <a href="{{ route('login') }}" class="text-white fw-bold text-decoration-none">Log In</a>
                    </span>
                </div>
            </div>
        </div>
    </header>

    <!-- Main content -->
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="signup-card card shadow p-4">
                    <div class="card-body">
                        <h2 class="text-white fw-bold text-center mb-4">Sign Up</h2>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form enctype="multipart/form-data" action="{{ route('signup.submit') }}" method="POST">
                           @csrf
                            <div class="row">
                                <!-- Left Column: Form Fields -->
                                <div class="col-md-9">
                                    <!-- Name -->
                                    <div class="mb-3">
                                       <!-- First Name -->
                          <div class="mb-3 row align-items-center">
                                <label for="first_name" class="col-sm-3 col-form-label text-white fw-bold">First Name:</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                                </div>
                            </div>
                            <!-- Last Name -->
                            <div class="mb-3 row align-items-center">
                                <label for="last_name" class="col-sm-3 col-form-label text-white fw-bold">Last Name:</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                                </div>
                            </div>
                                    </div>
                                     <!-- Username -->
                            <div class="mb-3 row align-items-center">
                                <label for="username" class="col-sm-3 col-form-label text-white fw-bold">Username:</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                            </div>
                            <!-- Password -->
                            <div class="mb-3 row align-items-center">
                                <label for="password" class="col-sm-3 col-form-label text-white fw-bold">Password:</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                            </div>
                            <!-- Confirm Password -->
                            <div class="mb-3 row align-items-center">
                                <label for="password_confirmation" class="col-sm-3 col-form-label text-white fw-bold">Confirm Password:</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                </div>
                            </div>
                                </div>

                                <!-- Right Column: Profile Picture -->
                                <div class="col-md-1 text-center">
                                    <div class="profile-upload-container">
                                        <label for="profile_picture" class="profile-upload-label">
                                            <img id="profile_preview" src="{{ asset('images/user.png') }}" alt="Profile Preview" class="profile-preview">
                                            <div class="upload-text">Upload image</div>
                                        </label>
                                        <input type="file" class="form-control d-none" id="profile_picture" name="profile_picture" accept="image/*" onchange="previewImage(event)">
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="row mt-4">
                                <div class="col-sm-6 offset-sm-3">
                                    <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('profile_preview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result; // Set the preview image source
                };

                reader.readAsDataURL(input.files[0]); // Read the file as a data URL
            }
        }
    </script>
</body>
</html>
