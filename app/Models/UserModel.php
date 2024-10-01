<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
    use HasFactory;
    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
    protected $guard = 'admin';
    protected $fillable = [
        'level_id',
        'email',
        'name',
        'password'
    ];
    protected $hidden = [
        'password',
    ];
    protected $casts = [
        'password' => 'hashed',
    ];
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('H:i | d-m-Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format(' H:i | d-m-Y');
    }

    public function level()
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    public function course()
    {
        return $this->hasMany(CourseModel::class, 'user_id', 'user_id');
    }

    public function getRoleName()
    {
        return $this->level->level_name;
    }
    public function hasRole($role)
    {
        return ($this->level->level_code === $role);
    }
    public function getRole()
    {
        return ($this->level->level_code);
    }
}
