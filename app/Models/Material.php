<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'file_path',
        'file_name'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

}
