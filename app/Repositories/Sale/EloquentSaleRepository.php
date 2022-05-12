<?php

namespace App\Repositories\Sale;

use App\Models\Sale;
use App\Repositories\Sale\SaleRepository;

class EloquentSaleRepository implements SaleRepository
{
    public function getAll()
    {
        return Sale::all();
    }

    public function store($data)
    {
        return Sale::create($data);
    }
}
