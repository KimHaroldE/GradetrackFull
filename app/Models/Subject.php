<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{ 
    public $table = 'subject';
    public $timestamps = false;
    protected $primaryKey = 'subject_id';
    protected $fillable = [
        'subject_name',
        'subject_code',
        'units',
        'midterm',
        'finals',
        'student_id'
    ];
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }
}
