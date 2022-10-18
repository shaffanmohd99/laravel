<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function getRole()
    {
        $data=Roles::all();
        return response()->json($data);
    }
}
