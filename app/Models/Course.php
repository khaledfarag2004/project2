<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = [
        'title',
        'user_id',
        'description',
        'price'
    ];
    public function user()
    {
        return $this->hasMany(User::class);
    }

}
