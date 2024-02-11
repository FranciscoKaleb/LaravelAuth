<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTemp extends Model
{
    use HasFactory;

    protected $table = 'user_temp';

    public $timestamps = false;

    protected $fillable = [
        'email', 'user_name', 'password', 'confirmation_code',
    ];
}
