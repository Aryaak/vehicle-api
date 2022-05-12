<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class SaleReport extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'laporan_penjualan';
    protected $guarded = [];
}
