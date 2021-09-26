<?php

namespace App\Http\Controllers;

use App\Http\Requests\KadesRequest;
use App\Models\KadesModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Throwable;

class KadesController extends Controller
{
    public function index()
    {
        $data = KadesModel::all();
        return view('Cms.Kades')->with('data', $data);
    }

    public function insert(KadesRequest $request)
    {
        $date = Carbon::now();
        $data = array(
            'nip' => $request->nip,
            'nama' => $request->nama,
            'creatd_at' => $date,
            'updated_at' => $date,
        );
        try {
            KadesModel::create($data);
            return back()->with('status', 'Data berhasil ditambahkan');
        } catch (Throwable $e) {
            report($e);
            return back()->with('error', $e);
        }
    }

    public function edit($id)
    {
        $result = KadesModel::where('id', $id)->first();
        return response()->json($result);
    }

    public function update(KadesRequest $request)
    {
        $id = $request->id;
        $date = Carbon::now();
        $data = array(
            'nip' => $request->nip,
            'nama' => $request->nama,
            'updated_at' => $date,
        );
        try {
            KadesModel::where('id', $id)->update($data);
            return back()->with('status', 'Data berhasil diubah');
        } catch (Throwable $e) {
            report($e);
            return back()->with('error', $e);
        }
    }

    public function delete($id)
    {
        KadesModel::where('id', $id)->delete();
        return response()->json();
    }
}
