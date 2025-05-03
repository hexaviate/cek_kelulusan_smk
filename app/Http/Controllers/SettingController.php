<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Setting::all();
        return view('content.setting.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.setting.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nama_lembaga' => 'required',
            'logo' => 'required|mimes:jpg,png',
            'tapel' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->route('setting.create')->withErrors($validate)->withInput();
        }

        $imageName = time() . '.' . $request->logo->extension();

        $request->logo->move(public_path('images'), $imageName);

        Setting::create([
            "nama_lembaga" => $request->nama_lembaga,
            "logo" => $imageName,
            "tapel" => $request->tapel,
            "is_active" => $request->is_active
        ]);

        return redirect()->route('setting.index');
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
        $setting = Setting::findOrFail($id);
        return view('content.setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'nama_lembaga' => 'required',
            'logo' => 'mimes:jpg,png',
            'tapel' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->route('setting.edit')->withErrors($validate)->withInput();
        }

        if ($request->hasFile('logo')) {
            $imageName = time() . '.' . $request->logo->extension();

            $request->logo->move(public_path('images'), $imageName);

            Setting::where('id', $id)->update([
                "nama_lembaga" => $request->nama_lembaga,
                "logo" => $imageName,
                "tapel" => $request->tapel,
                "is_active" => $request->is_active
            ]);
        } else {
            Setting::where('id', $id)->update([
                "nama_lembaga" => $request->nama_lembaga,
                "tapel" => $request->tapel,
                "is_active" => $request->is_active
            ]);
        }



        return redirect()->route('setting.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $setting = Setting::findOrFail($id);
        $setting->delete();
        return redirect()->route('setting.index');
    }
}
