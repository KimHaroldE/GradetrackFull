<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
   
    public function showRegistrationForm()
    {
        return view('signup'); 
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:student',
            'password' => 'required|string|confirmed|min:8',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle profile picture upload
        $profilePicturePath = null;
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        // Create the student record
        Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'profile_picture' => $profilePicturePath,
        ]);

        // Redirect to the login page
        return redirect()->route('login')->with('success', 'Account created successfully! Please log in.');
    }
    
    public function index()
    {
        // Return the view with the students data
        return view('landing');
    }

    public function dashboard()
    {
        if (!session()->has('student_id')) {
            return redirect()->route('login')->withErrors(['You must be logged in.']);
        }
        ~
        // Example: only show subjects for logged-in student
        $subjects = Subject::where('student_id', session('student_id'))->get();
        return view('dashboard', compact('subjects'));
    }
}

