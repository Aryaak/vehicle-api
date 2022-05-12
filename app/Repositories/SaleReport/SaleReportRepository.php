<?php

namespace App\Repositories\SaleReport;

interface SaleReportRepository
{
    public function getAll();
    public function find($id);
    public function getByVehicle($id);
    public function store($data);
    public function update($id, $data);
}
