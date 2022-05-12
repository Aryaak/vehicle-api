<?php

namespace App\Services;

use App\Models\Sale;
use App\Repositories\Vehicle\EloquentVehicleRepository;
use Exception;
use Illuminate\Support\Facades\Validator;

class VehicleService
{
    private $eloquentRepo;

    public function __construct(EloquentVehicleRepository $eloquentRepo)
    {
        $this->eloquentRepo = $eloquentRepo;
    }

    public function getStocks()
    {
        return $this->eloquentRepo->getAll();
    }


    public function sell($input)
    {
        // Validate input
        $validator = Validator::make($input, [
            'id_kendaraan' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
            'pembeli' => 'required'
        ]);

        if ($validator->fails()) throw new Exception($validator->errors()->first());

        // Check vehicle
        $vehicle = $this->eloquentRepo->find($input['id_kendaraan']);

        if (!$vehicle) throw new Exception("Vehicle not found", 500);

        // Check stock
        if ($vehicle->stock < $input['jumlah'] || $vehicle->stock <= 0) throw new Exception("Insufficient Vehicle Stock", 204);

        $this->eloquentRepo->reduceStock($input['id_kendaraan'], $input['jumlah']);

        // Sell
        return Sale::create($input);
    }

    public function getSellReports()
    {
        return $this->eloquentRepo->getSaleReports();
    }
}
