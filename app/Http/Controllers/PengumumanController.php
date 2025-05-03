<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengumumanController extends Controller
{
    public function Periksa(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nis' => 'required|exists:siswas,nis'
        ]);

        if($validator->fails()){
            return redirect()->route('login')->with('error', 'NIS tidak ditemukan');
        }

        $siswa = Siswa::where('nis', $request->nis)->get();
        return view('home.home', compact('siswa'));

    }
}
