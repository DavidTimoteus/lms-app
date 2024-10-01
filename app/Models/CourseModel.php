<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
    use HasFactory;
    protected $table = 'm_course';
    protected $primaryKey = 'course_id';

    protected $fillable = [
        'course_id',
        'teacher',
        'category',
        'title',
        'info',
        'image_path',
        'description',
        'certificate_path'
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'teacher', 'user_id');
    }
    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category', 'category_id');
    }

    public function lesson()
    {
        return $this->hasMany(LessonModel::class, 'course_id', 'course_id');
    }
    public function enroll()
    {
        return $this->hasMany(EnrollModel::class, 'course', 'course_id');
    }
    public function assigment()
    {
        return $this->hasMany(AssignmentModel::class, 'course', 'course_id');
    }
}
