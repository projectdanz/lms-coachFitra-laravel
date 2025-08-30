<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Course extends Model
{
    protected $fillable = [
        'nama',
        'harga',
        'password',
    ];

    public function user() {
        $this->hasMany(User::class);
    }
}
