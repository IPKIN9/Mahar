<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetailRequest;
use App\Models\DetailModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Throwable;

class DetailController extends Controller
{
    public function index()
    {
        $data = DetailModel::all();
        return view('Cms.Detail')->with('data', $data);
    }

    public function insert(DetailRequest $request)
    {
        $date = Carbon::now();
        $data = array(
            'kode_detail' => $request->kode_detail,
            'volume' => $request->volume,
            'harga_satuan' => $request->harga_satuan,
            'creatd_at' => $date,
            'updated_at' => $date,
        );
        try {
            DetailModel::create($data);
            return back()->with('status', 'Data berhasil ditambahkan');
        } catch (Throwable $e) {
            report($e);
            return back()->with('error', $e);
        }
    }

    public function edit($id)
    {
        $result = DetailModel::where('id', $id)->first();
        return response()->json($result);
    }

    public function update(DetailRequest $request)
    {
        $id = $request->id;
        $date = Carbon::now();
        $data = array(
            'kode_detail' => $request->kode_detail,
            'volume' => $request->volume,
            'harga_satuan' => $request->harga_satuan,
            'updated_at' => $date,
        );
        try {
            DetailModel::where('id', $id)->update($data);
            return back()->with('status', 'Data berhasil diubah');
        } catch (Throwable $e) {
            report($e);
            return back()->with('error', $e);
        }
    }

    public function delete($id)
    {
        DetailModel::where('id', $id)->delete();
        return response()->json();
    }
}
