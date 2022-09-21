<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PriorityLevel;
use App\Models\StatusType;
use App\Traits\ApiResponser;
use Illuminate\Http\Client\Request;
// use Illuminate\Http\Request;

class LookupController extends Controller
{
    use ApiResponser;
    //
    public function getCategories()
    {
        // dd($test=json_decode(Category::all(),true));
        return response()->json(Category::all());
        // return json_decode('{"a":1,"b":2,"c":3,"d":4,"e":5}',true);
        // return Category::select('id')->where('id',2)->first()->id; 
        //    return Category::select('category_type')->where('id',2)->first()->category_type; 
        // return Category::count();
        // $id(Category::select('id')->first()->id)

        // $count=Category::count();
        // $arr=[];
        // for ($i=0;$i<$count;$i++){

        // };

    
    }

    public function getStatus()
    {

        return response()->json(StatusType::all());
    }


    public function getPriority()
    {

        return response()->json(PriorityLevel::all());
    }
}
