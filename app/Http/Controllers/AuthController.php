<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('login'); // Render the login view
    }

    /**
     * Handle login request using session.
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $student = Student::where('username', $request->username)->first();

        if ($student && Hash::check($request->password, $student->password)) {
            // Store student data in session
            $request->session()->put('student_id', $student->student_id);
            $request->session()->put('student_name', $student->name);
            $request->session()->put('profile_picture', $student->profile_picture); 
            return redirect()->intended('dashboard')->with('success', 'Logged in successfully!');
        }        

        // Login failed
        return back()->withErrors([
            'username' => 'Invalid credentials.',
        ])->withInput($request->except('password'));
    }
     
    public function logout(Request $request)
    {
        $request->session()->flush(); // Clear all session data
        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }

    
}
