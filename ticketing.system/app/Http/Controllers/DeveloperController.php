<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeveloperController extends Controller
{
    //
    use ApiResponser;

    public function addCategory(Request $request,User $user)
    {
        dd($user->id);
        if($user->role=='developer' && $user->id==Auth::id()){
            $category=$request->validate([
                'category_type'=>'string'
            ]);
            $category=Category::create([
                'category_type'=>$category['category_type']
            ]);
            return Category::all();

        }
        abort(403);
    }
}
