<?php

namespace App\Models;

// app/Models/Submission.php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'assignment_id',
        'user_id',
        'submission_text',
        'submitted_files',
        'status',
    ];

    // ...

    public function assignment()
    {
        return $this->belongsTo(Assignment::class, 'assignment_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

