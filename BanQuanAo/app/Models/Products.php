<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    // Specify the table name if it differs from the pluralized form of the model name
    protected $table = 'products';

    // Specify the primary key if it is not 'id'
    protected $primaryKey = 'ProductID';

    // Disable timestamps if the table does not have 'created_at' and 'updated_at' columns
    public $timestamps = false;

    // Specify the fillable fields for mass assignment
    protected $fillable = [
        'ProductName', 
        'CategoryID', 
        'BrandID', 
        'Picture',
        'Size', 
        'Color', 
        'Price', 
        'Stock', 
        'Description', 
        'CreatedAt'
    ];

    // Relationships
    public function category()
    {
        return $this->belongsTo(Categories::class, 'CategoryID', 'CategoryID');
    }

    public function brand()
    {
        return $this->belongsTo(Brands::class, 'BrandID', 'BrandID');
    }

    public function orderdetails()
    {
        return $this->hasMany(Orderdetails::class, 'ProductID', 'ProductID');
    }
}
