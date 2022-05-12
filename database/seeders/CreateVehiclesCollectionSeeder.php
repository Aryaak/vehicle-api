<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class CreateVehiclesCollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicle::create([
            "nama" => "Toyota Avanza",
            "tahun_keluaran" => 2022,
            "warna" => "Putih",
            "harga" => 231000000,
            "mobil" => [
                "mesin" => "1329 cc",
                "kapasitas_penumpang" => 7,
                "tipe" => "MPV"
            ],
            "stock" => 5,
        ]);

        Vehicle::create([
            "nama" => "Nissan Livina",
            "tahun_keluaran" => 2022,
            "warna" => "Oranye",
            "harga" => 253900000,
            "mobil" => [
                "mesin" => "1499 cc",
                "kapasitas_penumpang" => 7,
                "tipe" => "MPV"
            ],
            "stock" => 10
        ]);

        Vehicle::create([
            "nama" => "Suzuki Ertiga",
            "tahun_keluaran" => 2022,
            "warna" => "Abu-abu",
            "harga" => 224100000,
            "mobil" => [
                "mesin" => "1462 cc",
                "kapasitas_penumpang" => 7,
                "tipe" => "MPV"
            ],
            "stock" => 7
        ]);

        Vehicle::create([
            "nama" => "Vespa Sprint",
            "tahun_keluaran" => 2022,
            "warna" => "Putih",
            "harga" => 50700000,
            "motor" => [
                "mesin" => "154.8 cc",
                "tipe_suspensi" => "Telescopic Fork",
                "tipe_transmisi" => "CVT"
            ],
            "stock" => 28
        ]);

        Vehicle::create([
            "nama" => "Honda PCX160",
            "tahun_keluaran" => 2022,
            "warna" => "Merah",
            "harga" => 31730000,
            "motor" => [
                "mesin" => "156.9 cc",
                "tipe_suspensi" => "Telescopic Fork",
                "tipe_transmisi" => "CVT"
            ],
            "stock" => 21
        ]);
    }
}
