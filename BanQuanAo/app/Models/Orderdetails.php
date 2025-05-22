<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderdetails extends Model
{
    // Specify the table name if it differs from the pluralized form of the model name
    protected $table = 'orderdetails';

    // Specify the primary key if it is not 'id'
    protected $primaryKey = 'OrderDetailID';

    // Disable timestamps if the table does not have 'created_at' and 'updated_at' columns
    public $timestamps = false;

    // Specify the fillable fields for mass assignment
    protected $fillable = ['OrderID', 'ProductID', 'Quantity', 'UnitPrice'];

    // Relationships
    public function order()
    {
        return $this->belongsTo(Orders::class, 'OrderID', 'OrderID');
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'ProductID', 'ProductID');
    }
}
