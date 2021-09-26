<?php

namespace App\Http\Controllers;

use App\Http\Requests\LokasiRequest;
use App\Models\LokasiModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Throwable;

class LokasiController extends Controller
{
    public function index()
    {
        $data = LokasiModel::all();
        return view('Cms.Lokasi')->with('data', $data);
    }

    public function insert(LokasiRequest $request)
    {
        $date = Carbon::now();
        $data = array(
            'nama_lokasi' => $request->nama_lokasi,
            'jenis' => $request->jenis,
            'creatd_at' => $date,
            'updated_at' => $date,
        );
        try {
            LokasiModel::create($data);
            return back()->with('status', 'Data berhasil ditambahkan');
        } catch (Throwable $e) {
            report($e);
            return back()->with('error', $e);
        }
    }

    public function edit($id)
    {
        $result = LokasiModel::where('id', $id)->first();
        return response()->json($result);
    }

    public function update(LokasiRequest $request)
    {
        $id = $request->id;
        $date = Carbon::now();
        $data = array(
            'nama_lokasi' => $request->nama_lokasi,
            'jenis' => $request->jenis,
            'updated_at' => $date,
        );
        try {
            LokasiModel::where('id', $id)->update($data);
            return back()->with('status', 'Data berhasil diubah');
        } catch (Throwable $e) {
            report($e);
            return back()->with('error', $e);
        }
    }

    public function delete($id)
    {
        LokasiModel::where('id', $id)->delete();
        return response()->json();
    }
}
