<?php

namespace App\Services;

use App\Models\Sale;
use App\Models\SaleReport;
use App\Repositories\Sale\EloquentSaleRepository;
use App\Repositories\SaleReport\EloquentSaleReportRepository;
use App\Repositories\Vehicle\EloquentVehicleRepository;
use Exception;
use Illuminate\Support\Facades\Validator;

class VehicleService
{
    private $vehicleEloquentRepo,
        $saleEloquentRepo,
        $saleReportEloquentRepo;

    public function __construct(EloquentVehicleRepository $vehicleEloquentRepo, EloquentSaleRepository $saleEloquentRepo, EloquentSaleReportRepository $saleReportEloquentRepo)
    {
        $this->vehicleEloquentRepo = $vehicleEloquentRepo;
        $this->saleEloquentRepo = $saleEloquentRepo;
        $this->saleReportEloquentRepo = $saleReportEloquentRepo;
    }

    public function getStocks()
    {
        return $this->vehicleEloquentRepo->getAll();
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
        $vehicle = $this->vehicleEloquentRepo->find($input['id_kendaraan']);

        if (!$vehicle) throw new Exception("Vehicle not found", 500);

        // Check stock
        if ($vehicle->stock < $input['jumlah'] || $vehicle->stock <= 0) throw new Exception("Insufficient Vehicle Stock", 204);

        $this->vehicleEloquentRepo->reduceStock($input['id_kendaraan'], $input['jumlah']);

        // Sell
        $sell =  $this->saleEloquentRepo->store($input);

        // Create sale report
        $saleReport = $this->saleReportEloquentRepo->getByVehicle($input['id_kendaraan']);

        if ($saleReport) {
            $this->saleReportEloquentRepo->update($saleReport->id, $sell);
        } else {
            $this->saleReportEloquentRepo->store([
                'id_kendaraan' => $input['id_kendaraan'],
                'jumlah' => $sell->jumlah,
                'total' => $sell->total,
                'daftar_penjualan' => [
                    [
                        'pembeli' => $sell->pembeli,
                        'jumlah' => $sell->jumlah,
                        'total' => $sell->total
                    ]
                ]
            ]);
        }

        return $sell;
    }

    public function getSales()
    {
        return $this->saleEloquentRepo->getAll();
    }

    public function getSaleReports()
    {
        return $this->saleReportEloquentRepo->getAll();
    }
}
