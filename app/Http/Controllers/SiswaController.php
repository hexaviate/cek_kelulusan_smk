<?php

namespace App\Http\Controllers;

use App\Imports\SiswaImport;
use App\Models\Setting;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Siswa::all();
        return view('content.siswa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $setting = Setting::where('is_active', 1)->get();
        return view('content.siswa.add', compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nis' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'setting_id' => 'required|exist:settings'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $setting = Setting::where('is_active', 1)->get();

        return view('content.siswa.edit', compact('siswa', 'setting', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'nis' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'password' => 'required'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        Siswa::where('id', $id)->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'password' => $request->password,
            'setting_id' => $request->setting_id,
            'bebas_perpus' => $request->bebas_perpus,
            'akademik' => $request->akademik,
            'administrasi' => $request->administrasi,
            'lap_ta' => $request->lap_ta,
            'lap_pkl' => $request->lap_pkl,
            'keterangan' => $request->keterangan,
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function import(Request $request)
    {
        set_time_limit(5000);
        // try{

            Excel::import(new SiswaImport, $request->file('file'));
            return response()->json(['data'=>'Users imported successfully.',201]);
        // }catch(\Exception $ex){
        //     Log::info($ex);
        //     return response()->json(['data'=>'Some error has occur.',400]);

        // }

    }
}
