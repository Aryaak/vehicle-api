<?php

namespace App\Repositories\Vehicle;

interface VehicleRepository
{
    public function getAll();
    public function find($id);
    public function reduceStock($id, $input);
}
