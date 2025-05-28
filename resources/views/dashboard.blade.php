<!-- filepath: c:\xampp\htdocs\GradetrackFull\resources\views\dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GradeTrack - Dashboard</title>
    <link rel="icon" href="{{ asset('images/logo1.png') }}" type="image/png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <div class="logo-container">
                <img src="{{ asset('images/logo1.png') }}" alt="GradeTrack Logo" class="logo">
            </div>
            <ul class="navbar-nav ms-auto">
                @if(session()->has('student_id'))
                    <li class="nav-item">
                        <img 
                            src="{{ asset('storage/' . session('profile_picture')) }}" 
                            alt="Profile Picture" 
                            class="rounded-circle" 
                            style="width: 40px; height: 40px; object-fit: cover;">
                    </li>
                    <li class="nav-item d-flex align-items-center px-2 text-white fw-bold">
                        {{ session('student_name') }}
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="CurrentPage" href="#">Dashboard</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="modal" data-bs-target="#addCourseModal">Add Subject</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="modal" data-bs-target="#manageSubjectsModal">Manage Subject</button>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link" style="color: white; text-decoration: none;">Logout</button>
                        </form> 
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="content py-5">
        <div class="container">
            <!-- Input Cards for Each Subject -->
            @foreach($subjects as $subject)
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="dashboard-card card shadow p-4">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <!-- Subject Name -->
                                <div class="col-md-5">
                                    <label class="form-label text-white fw-bold">Course Name</label>
                                    <input type="text" class="form-control course-input" value="{{ $subject->subject_name }}" readonly>
                                </div>

                                <!-- Midterm -->
                                <div class="col-md-2">
                                    <label class="form-label text-white fw-bold">Midterm</label>
                                    <input type="text" class="form-control grade-input" value="{{ $subject->midterm }}" readonly> 
                                </div>

                                <!-- Finals -->
                                <div class="col-md-2">
                                    <label class="form-label text-white fw-bold">Finals</label>
                                    <input type="text" class="form-control grade-input" value="{{ $subject->finals }}" readonly>
                                </div>

                                <!-- Units -->
                                <div class="col-md-2">
                                    <label class="form-label text-white fw-bold">Units</label>
                                    <input type="text" class="form-control units-input" value="{{ $subject->units }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
            @endforeach
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 75%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCourseModalLabel" >Add Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="subjectForm" action="{{ route('subjects.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Course Name -->
                            <div class="col-md-4">
                                <label for="course_name" class="form-label text-black fw-bold">Course Name</label>
                                <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Course name" required>
                            </div>

                            <!-- Midterm -->
                            <div class="col-md-2">
                                <label for="midterm" class="form-label text-black fw-bold">Midterm</label>
                                <input type="text" class="form-control" id="midterm" name="midterm" placeholder="Midterm" required>
                            </div>

                            <!-- Finals -->
                            <div class="col-md-2">
                                <label for="finals" class="form-label text-black fw-bold">Finals</label>
                                <input type="text" class="form-control" id="finals" name="finals" placeholder="Finals" required>
                            </div>

                            <!-- Units -->
                            <div class="col-md-2">
                                <label for="units" class="form-label text-black fw-bold">Units</label>
                                <input type="number" class="form-control" id="units" name="units" placeholder="Units" required>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="addRowButton">Add</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" form="subjectForm">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Manage Subjects Modal -->
    <div class="modal fade" id="manageSubjectsModal" tabindex="-1" aria-labelledby="manageSubjectsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="manageSubjectsModalLabel">Manage Subjects</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Course Name</th>
                                <th>Midterm</th>
                                <th>Finals</th>
                                <th>Units</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach($subjects as $subject)
                            <tr>
                                <form action="{{route('subjects.update', $subject->subject_id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <td>
                                        <input type="text" name="course_name" value="{{ $subject->subject_name }}" class="form-control" required>
                                    </td>
                                    <td>
                                        <input type="text" name="midterm" value="{{ $subject->midterm }}" class="form-control" required>
                                    </td>
                                    <td>
                                        <input type="text" name="finals" value="{{ $subject->finals }}" class="form-control" required>
                                    </td>
                                    <td>
                                        <input type="number" name="units" value="{{ $subject->units }}" class="form-control" required>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                                </form>
                                    <form action="{{ route('subjects.destroy', $subject->subject_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this subject?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('addRowButton').addEventListener('click', function () {
            // Get the form container
            const formContainer = document.querySelector('#subjectForm .row');

            // Create a new row
            const newRow = document.createElement('div');
            newRow.classList.add('row', 'mt-3');

            // Add the Course Name field
            newRow.innerHTML = 
                <div class="col-md-4">
                    <label for="course_name" class="form-label text-black fw-bold">Course Name</label>
                    <input type="text" class="form-control" name="course_name[]" placeholder="Course name" required>
                </div>
                <div class="col-md-2">
                    <label for="midterm" class="form-label text-black fw-bold">Midterm</label>
                    <input type="text" class="form-control" name="midterm[]" placeholder="Midterm" required>
                </div>
                <div class="col-md-2">
                    <label for="finals" class="form-label text-black fw-bold">Finals</label>
                    <input type="text" class="form-control" name="finals[]" placeholder="Finals" required>
                </div>
                <div class="col-md-2">
                    <label for="units" class="form-label text-black fw-bold">Units</label>
                    <input type="number" class="form-control" name="units[]" placeholder="Units" required>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger remove-row">X</button>
                </div>
            `;

            // Append the new row to the form container
            formContainer.appendChild(newRow);

            // Add event listener to the "Remove" button
            newRow.querySelector('.remove-row').addEventListener('click', function () {
                newRow.remove();
            });
        });
    </script>
</body>
</html>