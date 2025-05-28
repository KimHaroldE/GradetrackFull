<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    
    public function index()
    {
        // Fetch all subjects from the database
        $subjects = Subject::all();

        // Pass the data to the dashboard view
        return view('dashboard', compact('subjects'));
    }

    public function store(Request $request)
    {
        // Validate and store the new subject
        $request->validate([
            'course_name' => 'required|string|max:255',
            'midterm' => 'required|float',
            'finals' => 'required|float',
            'units' => 'required|integer'
        ]);

        Subject::create($request->all());

        return redirect()->route('dashboard')->with('success', 'Course added successfully!');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_name' => 'required|string|max:255',
            'midterm' => 'required',
            'finals' => 'required',
            'units' => 'required|integer'
        ]);

        $subject = Subject::findOrFail($id);
        $subject->update([
            'subject_name' => $request->course_name,
            'midterm' => $request->midterm,
            'finals' => $request->finals,
            'units' => $request->units
        ]);

        return redirect()->route('dashboard')->with('success', 'Subject updated!');
    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return redirect()->route('dashboard')->with('success', 'Subject deleted!');
    }
}
