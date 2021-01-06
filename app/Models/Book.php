<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';
    protected $primaryKey = 'book_id';
    protected $fillable = [
        'uuid',
        'cover',
        'name',
        'writer',
        'publisher',
        'publish_at',
        'stock',
        'category_id',
        'created_at',
        'updated_at',
    ];
}
