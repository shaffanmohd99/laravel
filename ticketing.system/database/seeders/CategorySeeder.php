<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
            ['id'=>1,'category_type'=>'Adnexio'],
            ['id'=>2,'category_type'=>'Decoris'],
            ['id'=>3,'category_type'=>'Meniaga'],
            ['id'=>4,'category_type'=>'Cista'],
           
        ];
        Category::insert($data);
    }
}
