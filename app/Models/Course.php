<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_code',
        'instructor_id',
        'name',
        'description'
    ];

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'enrollments');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
