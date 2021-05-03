<?php

namespace App\Models\eloquen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $table = "product_images";
    protected $fillable = ["photo", "product_id"];
}
