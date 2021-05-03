<?php

namespace App\Models\eloquen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    protected  $table = "product_details";
    protected $fillable = ["description", "avatar", "price", "product_id"];
    
    public function Product(){
        return $this->belongsTo(Product::class, "product_id", "id");
    }
}
