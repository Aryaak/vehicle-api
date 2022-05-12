<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Sale extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'penjualan';
    protected $guarded = [];
}
