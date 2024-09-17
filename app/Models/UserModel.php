<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
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
}
