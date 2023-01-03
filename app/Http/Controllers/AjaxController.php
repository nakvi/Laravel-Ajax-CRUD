<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ajax;
use Illuminate\Support\Facades\DB;


class AjaxController extends Controller
{

    public function index(Request $request)
    {
        $ajax = new Ajax();
        $ajax->name = $request->post('name');
        $ajax->name2 = $request->post('name2');
        $ajax->email = $request->post('email');
        $ajax->password = $request->post('password');
        $ajax->save();
        return ["msg" => "Data Insert"];
    }
    public function show()
    {
        $aj = Ajax::all();
        return response()->json([
            'aj' => $aj
        ]);
    }

    public function destroye($id)
    {
        $aj = Ajax::find($id);
        $aj->delete();
     

    }
    public function edit($id)
    {
        $aj = Ajax::find($id);
        return response()->json([
            'aj' => $aj
        ]);
    }
}
