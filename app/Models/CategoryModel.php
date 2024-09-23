<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table = 'm_category';
    protected $primaryKey = 'category_id';
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name'
    ];

    public function course()
    {
        return $this->hasMany(CourseModel::class, 'category', localKey: 'category_id');
    }
}
