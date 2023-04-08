<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VehicleList;

class VehicleListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicleLists = [
                ['vehicle_type'=>'2 Wheeler',
                'status'=>1,
                ],
                ['vehicle_type'=>'3 Wheeler',
                'status'=>1,
                ],
                ['vehicle_type'=>'4 Wheeler',
                'status'=>1,
                ],
                ['vehicle_type'=>'6 Wheeler',
                'status'=>1,
                ],
                ['vehicle_type'=>'10 Wheeler',
                'status'=>1,
                ],
                ['vehicle_type'=>'16 Wheeler',
                'status'=>1,
                ],
        ];
        foreach($vehicleLists as $vehicleList)
        {
            VehicleList::create($vehicleList);
        }
    }
}
