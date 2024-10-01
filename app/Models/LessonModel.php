<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonModel extends Model
{
    use HasFactory;
    protected $table = 't_lesson';
    protected $primaryKey = 'lesson_id';

    protected $fillable = [
        'course',
        'lesson_id',
        'lesson_title',
        'progress_percentage',
        'modul_path',
        'lesson_score'
    ];
    
    public function courses()
    {
        return $this->belongsTo(CourseModel::class, 'course', 'course_id');
    }
}
