<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $table = 'instructor';
    protected $primaryKey = 'instructor_id';
    public $timestamps = true;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'contact_number',
        'subject_id',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'subject_id');
    }
}
