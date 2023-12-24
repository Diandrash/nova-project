<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'title',
        'description',
        'deadline',
        'files',
    ];


    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    // Relasi many-to-many ke tabel Users melalui tabel Submissions
    public function users()
    {
        return $this->belongsToMany(User::class, 'submissions', 'assignment_id', 'user_id')
            ->using(Submission::class)
            ->withPivot(['submission_text', 'submitted_files', 'submitted_at'])
            ->withTimestamps();
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
    
    // Dalam model Assignment.php

    public static function assignmentsByInstructor($instructorId)
    {
        // Ambil semua assignment yang memiliki course dengan instructor_id yang diinputkan
        return self::whereHas('course', function ($query) use ($instructorId) {
            $query->where('instructor_id', $instructorId);
        })->get();
    }

    // M
}
