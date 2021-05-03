<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    // chi dinh table mapping tuong ung voi model Book
    protected $table = "book2";
    protected $fillable = ["name", "title", "author", "price", "publish", "is_active"];
    
}
