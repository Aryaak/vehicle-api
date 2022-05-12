<?php

namespace Tests\Unit;

use Tests\TestCase;

class VehicleTest extends TestCase
{
    public function test_get_stocks()
    {
        $this->get(route('vehicle.getStocks'))
            ->assertStatus(200);
    }

    public function test_get_sale_reports()
    {
        $this->get(route('vehicle.getSellReports'))
            ->assertStatus(200);
    }

    public function test_sell()
    {
        $data = [
            "id_kendaraan" => "627cc6e67284735a33059fd2",
            "jumlah" => 1,
            "total" => 2000000,
            "pembeli" => [
                "nama" => "Arya Rizky Tri Putra",
                "email" => "aryarizky2303@gmail.com",
                "alamat" => "Jl. Babatan UNESA"
            ]
        ];

        $this->post(route('vehicle.sell'), $data)
            ->assertStatus(200);
    }
}
