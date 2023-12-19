<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'Product_name', 'sale_qty', 'sale_price'];
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    

}
