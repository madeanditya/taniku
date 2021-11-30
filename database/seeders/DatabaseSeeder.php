<?php

namespace Database\Seeders;

use App\Models\Shipper;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Shipper::create([
            'from' => 'abiansemal',
            'to' => 'kuta',
            'max_weight' => '',
            'courier' => '',
            'service_type' => '',
            'estimation' => '',
            'price' => ''
        ]);

        Shipper::create([
            'from' => 'abiansemal',
            'to' => 'kuta selatan',
            'max_weight' => '',
            'courier' => '',
            'service_type' => '',
            'estimation' => '',
            'price' => ''
        ]);

        Shipper::create([
            'from' => 'abiansemal',
            'to' => 'kuta utara',
            'max_weight' => '',
            'courier' => '',
            'service_type' => '',
            'estimation' => '',
            'price' => ''
        ]);

        Shipper::create([
            'from' => 'abiansemal',
            'to' => 'mengwi',
            'max_weight' => '',
            'courier' => '',
            'service_type' => '',
            'estimation' => '',
            'price' => ''
        ]);

        Shipper::create([
            'from' => 'abiansemal',
            'to' => 'petang',
            'max_weight' => '',
            'courier' => '',
            'service_type' => '',
            'estimation' => '',
            'price' => ''
        ]);

        Shipper::create([
            'from' => 'kuta',
            'to' => 'abiansemal',
            'max_weight' => '',
            'courier' => '',
            'service_type' => '',
            'estimation' => '',
            'price' => ''
        ]);

        Shipper::create([
            'from' => 'kuta',
            'to' => 'kuta selatan',
            'max_weight' => '',
            'courier' => '',
            'service_type' => '',
            'estimation' => '',
            'price' => ''
        ]);
        
        Shipper::create([
            'from' => 'kuta',
            'to' => 'kuta utara',
            'max_weight' => '',
            'courier' => '',
            'service_type' => '',
            'estimation' => '',
            'price' => ''
        ]);

        Shipper::create([
            'from' => 'kuta',
            'to' => 'mengwi',
            'max_weight' => '',
            'courier' => '',
            'service_type' => '',
            'estimation' => '',
            'price' => ''
        ]);

        Shipper::create([
            'from' => 'kuta',
            'to' => 'petang',
            'max_weight' => '',
            'courier' => '',
            'service_type' => '',
            'estimation' => '',
            'price' => ''
        ]);

        Shipper::create([
            'from' => 'kuta selatan',
            'to' => 'abiansemal',
            'max_weight' => '',
            'courier' => '',
            'service_type' => '',
            'estimation' => '',
            'price' => ''
        ]);

        Shipper::create([
            'from' => 'kuta selatan',
            'to' => 'kuta',
            'max_weight' => '',
            'courier' => '',
            'service_type' => '',
            'estimation' => '',
            'price' => ''
        ]);

        Shipper::create([
            'from' => 'kuta utara',
            'to' => 'mengwi',
            'max_weight' => '',
            'courier' => '',
            'service_type' => '',
            'estimation' => '',
            'price' => ''
        ]);

        Shipper::create([
            'from' => 'kuta',
            'to' => 'petang',
            'max_weight' => '',
            'courier' => '',
            'service_type' => '',
            'estimation' => '',
            'price' => ''
        ]);

        Shipper::create([
            'from' => 'kuta selatan',
            'to' => 'kuta ut',
            'max_weight' => '',
            'courier' => '',
            'service_type' => '',
            'estimation' => '',
            'price' => ''
        ]);

        Shipper::create([
            'from' => 'kuta',
            'to' => 'kuta utara',
            'max_weight' => '',
            'courier' => '',
            'service_type' => '',
            'estimation' => '',
            'price' => ''
        ]);

        Shipper::create([
            'from' => 'kuta',
            'to' => 'kuta utara',
            'max_weight' => '',
            'courier' => '',
            'service_type' => '',
            'estimation' => '',
            'price' => ''
        ]);
    }
}
