<?php

use App\Car;
use App\CarTypes;
use App\Driver;
use App\User;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Driver::create([
            'full_name' => 'Hamada Salah',
            'email' => 'hamada@yahoo.com',
            'phone' => '+201124928786',
            'password' => bcrypt('123123123'),
            'type' => 'company',
            'country' => 'Egypt',
            'city' => 'Cairo',
            'photo' => 'no-img.png',
            'NationID' => '255589999888887',
            'D_licence' => '5454544',
            'com_reg' => '7489630555',
            'lang' => '1.25888',
            'lat' => '2.335874',
            'address' => 'EGypt, Cairo',
            'tax_no' => '55996633',
            'status' => 0,
        ]);
        Car::create([
            'driver_id' => 1,
            'type' => 'Sedan',
            'model' => 'New',
            'year' => '2020',
            'car_no' => '4896-KH',
            'country' => 'Egypt',
            'city' => 'Cairo',
            'img_front' => 'no-img.png',
            'img_back' => 'no-img.png',
            'img_left' => 'no-img.png',
            'img_right' => 'no-img.png',
            'form' => 'no-img.png',
            'policy' => 'no-img.png',
        ]);
        CarTypes::create([
            'name' => 'حافلات',
            'img' => 'http://serb.devhamadasalah.com/storage/images/cartypes/7afla.png'
        ]);
        CarTypes::create([
            'name' => 'نقل اثاث منزلي',
            'img' => 'http://serb.devhamadasalah.com/storage/images/cartypes/asas.png'
        ]);
        CarTypes::create([
            'name' => 'شاحنات',
            'img' => 'http://serb.devhamadasalah.com/storage/images/cartypes/sha7na.png'
        ]);
        CarTypes::create([
            'name' => 'أخري',
            'img' => 'http://serb.devhamadasalah.com/storage/images/cartypes/other.png'
        ]);
        /////////////////////////////
        CarTypes::create([
            'name' => 'حافلات صغيرة (10-20) راكب',
            'img' => 'http://serb.devhamadasalah.com/storage/images/cartypes/7afla.png',
            'parent_id' => 1
        ]);
        CarTypes::create([
            'name' => 'حافلات متوسطة (20-40) راكب',
            'img' => 'http://serb.devhamadasalah.com/storage/images/cartypes/7afla.png',
            'parent_id' => 1
        ]);
        CarTypes::create([
            'name' => 'حافلات كبيرة (+40) راكب',
            'img' => 'http://serb.devhamadasalah.com/storage/images/cartypes/7afla.png',
            'parent_id' => 1
        ]);
        ///////////////////////////
        CarTypes::create([
            'name' => 'نقل صغير (1) غرفة',
            'img' => 'http://serb.devhamadasalah.com/storage/images/cartypes/asas.png',
            'parent_id' => 2
        ]);
        CarTypes::create([
            'name' => 'نقل كامل',
            'img' => 'http://serb.devhamadasalah.com/storage/images/cartypes/asas.png',
            'parent_id' => 2
        ]);
        CarTypes::create([
            'name' => 'نقل بين المدن',
            'img' => 'http://serb.devhamadasalah.com/storage/images/cartypes/asas.png',
            'parent_id' => 2
        ]);
        ///////////////////////////
        CarTypes::create([
            'name' => 'نقل بضائع',
            'img' => 'http://serb.devhamadasalah.com/storage/images/cartypes/sha7na.png',
            'parent_id' => 3
        ]);
        CarTypes::create([
            'name' => 'نقل بين المدن',
            'img' => 'http://serb.devhamadasalah.com/storage/images/cartypes/sha7na.png',
            'parent_id' => 3
        ]);
        CarTypes::create([
            'name' => 'نقل دولي',
            'img' => 'http://serb.devhamadasalah.com/storage/images/cartypes/sha7na.png',
            'parent_id' => 3
        ]);
        ///////////////////////////
        CarTypes::create([
            'name' => 'نقل ردميات',
            'img' => 'http://serb.devhamadasalah.com/storage/images/cartypes/other.png',
            'parent_id' => 4
        ]);
        CarTypes::create([
            'name' => 'حاويات',
            'img' => 'http://serb.devhamadasalah.com/storage/images/cartypes/other.png',
            'parent_id' => 4
        ]);
        User::create([
            'name' => 'shebo',
            'email' => 'shebo@mail.com',
            'password' => bcrypt('123456'),
            'phone' => '+201124928786'
        ]);
        Driver::create([
            'full_name' => 'driver',
            'email' => 'driver@mail.com',
            'password' => bcrypt('123456'),
            'phone' => '+201124928786'
        ]);

    }
}
