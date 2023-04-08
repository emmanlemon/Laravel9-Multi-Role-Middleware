<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServiceList;

class ServiceListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $serviceLists = [
                ['service'=>'Wash'],
                ['service'=>'Interior Cleaning'],
                ['service'=>'Change Oil'],
                ['service'=>'Tire air cleaner'],
                ['service'=>'Repair'],
        ];
        foreach($serviceLists as $serviceList)
        {
            ServiceList::create($serviceList);
        }
    }
}
