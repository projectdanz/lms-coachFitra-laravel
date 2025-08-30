<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'harga',
        'password',
        'course_url',
    ];

    public function user() {
        $this->hasMany(User::class);
    }
}
