<?php

namespace App\Repositories\SaleReport;

use App\Models\SaleReport;
use App\Repositories\SaleReport\SaleReportRepository;

class EloquentSaleReportRepository implements SaleReportRepository
{
    public function getAll()
    {
        return SaleReport::all();
    }

    public function find($id)
    {
        return SaleReport::find($id);
    }

    public function store($data)
    {
        return SaleReport::create($data);
    }

    public function getByVehicle($id)
    {
        return SaleReport::where('id_kendaraan', $id)->first();
    }

    public function update($id, $data)
    {

        $saleReport = $this->find($id);
        $daftar_penjualan = $saleReport->daftar_penjualan;
        $daftar_penjualan[] = [
            'pembeli' => $data->pembeli,
            'jumlah' => $data->jumlah,
            'total' => $data->total
        ];
        $saleReport->jumlah += $data->jumlah;
        $saleReport->total += $data->total;
        $saleReport->daftar_penjualan = $daftar_penjualan;
        $saleReport->save();
    }
}
