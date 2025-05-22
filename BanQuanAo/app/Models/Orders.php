<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    // Specify the table name if it differs from the pluralized form of the model name
    protected $table = 'orders';

    // Specify the primary key if it is not 'id'
    protected $primaryKey = 'OrderID';

    // Disable timestamps if the table does not have 'created_at' and 'updated_at' columns
    public $timestamps = false;

    // Specify the fillable fields for mass assignment
    protected $fillable = ['CustomerID', 'OrderDate', 'Status', 'TotalAmount'];

    // Relationships
    public function customer()
    {
        return $this->belongsTo(Customers::class, 'CustomerID', 'CustomerID');
    }

    public function orderdetails()
    {
        return $this->hasMany(Orderdetails::class, 'OrderID', 'OrderID');
    }
}
