<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::user()->role=='developer'){
            $data=Category::all();
           // $this->authorize('viewAny',$data);
            return response()->json($data);

        }
        abort(403);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Auth::user()->role=='developer'){
            $category=$request->validate([
                'category_type'=>'string'
            ]);
    
            $category=Category::create([
                'category_type'=>$category['category_type']
            ]);
    
            return response()->json($category);

        }
        abort(403);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if(Auth::user()->role=='developer'){
            $category=Category::findOrFail($id);
            return $category;
        }

        abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        if(Auth::user()->role=='developer'){
            $category=Category::findOrFail($id);
            $category->update($request->all());
            return response()->json($category);

        }
        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(Auth::user()->role=='developer'){
            Category::findOrFail($id)->delete();
        return response("Delete category id: ".$id,204);

        }
        abort(403);
    }
}
