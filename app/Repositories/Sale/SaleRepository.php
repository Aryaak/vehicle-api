<?php

namespace App\Repositories\Sale;

interface SaleRepository
{
    public function getAll();
    public function store($data);
}
