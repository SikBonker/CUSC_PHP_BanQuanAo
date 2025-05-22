<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $table = 'brands';
    protected $primaryKey = 'BrandID';
    public $timestamps = false;
    protected $fillable = [
        'BrandName',
    ];
}
