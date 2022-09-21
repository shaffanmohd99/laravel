<?php

namespace Database\Seeders;

use App\Models\StatusType;
use Illuminate\Database\Seeder;

class StatusTypeSeeder extends Seeder
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
            ['id'=>1,'type'=>'completed'],
            ['id'=>2,'type'=>'in-progress'],
            ['id'=>3,'type'=>'backlog'],
           
        ];
        StatusType::insert($data);
    }
}
