<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // You can use factories to create subjects or manually insert them
        // Example of manual insertion:
        DB::table('subject')->insert([
            ['subject_name' => 'Mathematics', 'subject_code' => 'MATH101', 'units' => 3, 'midterm' => 50, 'finals' => 50, 'student_id' => 1],
            ['subject_name' => 'English', 'subject_code' => 'ENG101', 'units' => 3, 'midterm' => 50, 'finals' => 50, 'student_id' => 1],
            ['subject_name' => 'Computer Science', 'subject_code' => 'CS101', 'units' => 3, 'midterm' => 50, 'finals' => 50, 'student_id' => 1],
            ['subject_name' => 'Physics', 'subject_code' => 'PHYS101', 'units' => 3, 'midterm' => 50, 'finals' => 50, 'student_id' => 1],
            ['subject_name' => 'Chemistry', 'subject_code' => 'CHEM101', 'units' => 3, 'midterm' => 50, 'finals' => 50, 'student_id' => 1],
            ['subject_name' => 'Biology', 'subject_code' => 'BIO101', 'units' => 3, 'midterm' => 50, 'finals' => 50, 'student_id' => 1],
            ['subject_name' => 'History', 'subject_code' => 'HIST101', 'units' => 3, 'midterm' => 50, 'finals' => 50, 'student_id' => 1],
        ]);
    }
}
