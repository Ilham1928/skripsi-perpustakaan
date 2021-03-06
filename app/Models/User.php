<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'name',
        'nisn',
        'password',
        'class',
        'created_at',
        'updated_at',
    ];
}
