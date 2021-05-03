<?php

namespace App\Models\eloquen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected  $table = "products";
    protected $fillable = ["name"];
    
    public function ProductDetail(){
        return $this->hasOne(ProductDetail::class, "product_id", "id");
    }
    public function ProductImages(){
        return $this->hasMany(ProductImage::class, "product_id", "id");
        
    }
}
