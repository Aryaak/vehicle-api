<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Utils\ResponseFormatter;
use App\Services\VehicleService;
use Exception;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    private $service;

    public function __construct(VehicleService $service)
    {
        $this->service = $service;
    }

    /**
     * Get stocks all vehicles
     * 
     * @return \App\Utils\ResponseFormatter
     */

    public function getStocks()
    {
        try {
            $output = $this->service->getStocks();
        } catch (Exception $e) {
            return ResponseFormatter::failed($e->getMessage(), $e->getCode());
        }

        return ResponseFormatter::success('Get Stocks Success!', $output);
    }

    /**
     * Sale vehicle to client
     * 
     * @return \App\Utils\ResponseFormatter
     */

    public function sell(Request $request)
    {
        $input = $request->all();

        try {
            $outoput = $this->service->sell($input);
        } catch (Exception $e) {
            return ResponseFormatter::failed($e->getMessage(), $e->getCode());
        }

        return ResponseFormatter::success('Sale Vehicle Success!',  $outoput);
    }

    /**
     * Get all vehicle sales reports 
     * 
     * @return \App\Utils\ResponseFormatter
     */

    public function getSales()
    {
        try {
            $outoput = $this->service->getSales();
        } catch (Exception $e) {
            return ResponseFormatter::failed($e->getMessage(), $e->getCode());
        }

        return ResponseFormatter::success('Get All Sales Success!',  $outoput);
    }

    public function getSaleReports()
    {
        try {
            $outoput = $this->service->getSaleReports();
        } catch (Exception $e) {
            return ResponseFormatter::failed($e->getMessage(), $e->getCode());
        }

        return ResponseFormatter::success('Get All Vehicles Sales Reports Success!',  $outoput);
    }
}
