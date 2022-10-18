<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
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
            ['id'=>1,'role'=>'admin'],
            ['id'=>2,'role'=>'user'],
           
        ];
        Roles::insert($data);
    }
}
