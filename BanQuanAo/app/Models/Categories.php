<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    // Specify the table name if it differs from the pluralized form of the model name
    protected $table = 'categories';

    // Specify the primary key if it is not 'id'
    protected $primaryKey = 'CategoryID';

    // Disable timestamps if the table does not have 'created_at' and 'updated_at' columns
    public $timestamps = false;

    // Specify the fillable fields for mass assignment
    protected $fillable = ['CategoryName'];

    // Relationships
    public function products()
    {
        return $this->hasMany(Products::class, 'CategoryID', 'CategoryID');
    }
}
