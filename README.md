# vehicle-api
Layanan REST API untuk manajemen kendaraaan

### Alat yang dibutuhkan
1. composer 2.0
2. php 8
3. mongodb 4.2
4. git bash

### Cara installasi
1. Clone repository menggunakan git bash  `git clone https://github.com/Aryaak/vehicle-api.git`
2. Masuk ke dalam project `cd vehicle-api`
3. Install paket yang dibutuhkan dengan menjalankan `composer install`
4. Buat database pada mongodb dengan nama `vehicle_api`
5. Jalankan seeder `php artisan db:seed`
6. Generate secret code JWT dengan menjalankan `php artisan jwt:secret`
7. Jalankan service dengan `php artisan serve`
8. Layanan siap digunakan

### Endpoint API
1. POST - Login `host/api/auth/login`
2. GET - Lihat stok kendaraan `host/api/v1/vehicle/get-stocks`
3. POST - Penjualan kendaraan `host/api/v1/vehicle/sell`
4. GET - Lihat stok kendaraan `host/api/v1/vehicle/get-sale-reports`

Dokumentasi API lebih lengkap [disini](https://www.petanikode.com/)
