<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    
    protected $fillable = [
        'name',
        'description',
        'image',
        'slug',
        'product_category',
        'price',
        'qty'
    ];

    protected $guarded = ['id','created_at','updated_at'];

    public function productCategory()
    {
        return $this->belongsTo('App\ProductCategory');
    }
    
}
