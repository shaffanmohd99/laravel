<?php

namespace Database\Seeders;

use App\Models\PriorityLevel;
use Illuminate\Database\Seeder;

class PriorityLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data=[
            ['id'=>1,'level'=>'high'],
            ['id'=>2,'level'=>'mid'],
            ['id'=>3,'level'=>'low'],
           
        ];
        PriorityLevel::insert($data);
    }
}
