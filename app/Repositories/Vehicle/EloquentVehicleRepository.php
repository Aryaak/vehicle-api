<?php

namespace App\Repositories\Vehicle;

use App\Models\Vehicle;
use App\Repositories\Vehicle\VehicleRepository;

class EloquentVehicleRepository implements VehicleRepository
{
    public function getAll()
    {
        return Vehicle::all();
    }

    public function find($id)
    {
        return Vehicle::find($id);
    }

    public function reduceStock($id, $input)
    {
        $vehicle = $this->find($id);
        $vehicle->stock -= $input;
        $vehicle->save();
    }
}
