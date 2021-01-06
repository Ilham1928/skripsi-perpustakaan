<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBorrow extends Model
{
    protected $table = 'borrow';
    protected $primaryKey = 'borrow_id';
    protected $fillable = [
        'user_id',
        'book_id',
        'borrow_date',
        'return_date',
        'created_at',
        'updated_at',
    ];
}
