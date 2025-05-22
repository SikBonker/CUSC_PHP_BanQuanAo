<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    // Specify the table name if it differs from the pluralized form of the model name
    protected $table = 'customers';

    // Specify the primary key if it is not 'id'
    protected $primaryKey = 'CustomerID';

    // Disable timestamps if the table does not have 'created_at' and 'updated_at' columns
    public $timestamps = false;

    // Specify the fillable fields for mass assignment
    protected $fillable = ['Name', 'Email', 'Phone', 'Address', 'CreatedAt'];

    // Relationships
    public function orders()
    {
        return $this->hasMany(Orders::class, 'CustomerID', 'CustomerID');
    }
}
