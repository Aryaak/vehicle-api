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
5. Ubah nama file `.env.example` menjadi `.env`
6. Sesuaikan konfigurasi mongodb pada file `.env` sesuai dengan koneksi mongodb anda <br>
![Untitled](https://user-images.githubusercontent.com/55610152/168071383-ce37137d-d439-4090-8425-1bcf52076a73.png)
8. Jalankan seeder `php artisan db:seed`
9. Generate secret code JWT dengan menjalankan `php artisan jwt:secret`
10. Jalankan unit testing :
   - windows `vendor\bin\phpunit`
   - linux `./vendor/bin/phpunit` 
11. Jalankan service dengan `php artisan serve`
12. Layanan siap digunakan

### Endpoint API
1. POST - Login `host/api/auth/login`
2. GET - Lihat stok kendaraan `host/api/v1/vehicle/get-stocks`
3. POST - Penjualan kendaraan `host/api/v1/vehicle/sell`
4. GET - Lihat stok kendaraan `host/api/v1/vehicle/get-sale-reports`

Dokumentasi API lebih lengkap [disini](https://documenter.getpostman.com/view/11372299/UyxhkmT7)
