<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelulusanController extends Controller
{
    public function view_kelulusan()
    {
        //
    }

    public function do_kelulusan(Request $request){
        $validation = Validator::make($request->all(), [

        ]);
    }
}
