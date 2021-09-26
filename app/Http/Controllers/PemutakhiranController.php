<?php

namespace App\Http\Controllers;

use App\Http\Requests\PemutakhiranRequest;
use App\Models\PemutakhiranModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Throwable;

class PemutakhiranController extends Controller
{
    public function index()
    {
        $data = PemutakhiranModel::all();
        return view('Cms.Pemutakhiran')->with('data', $data);
    }

    public function insert(PemutakhiranRequest $request)
    {
        $date = Carbon::now();
        $data = array(
            'jenis_temuan' => $request->jenis_temuan,
            'pagu_anggaran' => $request->pagu_anggaran,
            'ket' => $request->ket,
            'creatd_at' => $date,
            'updated_at' => $date,
        );
        try {
            PemutakhiranModel::create($data);
            return back()->with('status', 'Data berhasil ditambahkan');
        } catch (Throwable $e) {
            report($e);
            return back()->with('error', $e);
        }
    }

    public function edit($id)
    {
        $result = PemutakhiranModel::where('id', $id)->first();
        return response()->json($result);
    }

    public function update(PemutakhiranRequest $request)
    {
        $id = $request->id;
        $date = Carbon::now();
        $data = array(
            'jenis_temuan' => $request->jenis_temuan,
            'pagu_anggaran' => $request->pagu_anggaran,
            'ket' => $request->ket,
            'updated_at' => $date,
        );
        try {
            PemutakhiranModel::where('id', $id)->update($data);
            return back()->with('status', 'Data berhasil diubah');
        } catch (Throwable $e) {
            report($e);
            return back()->with('error', $e);
        }
    }

    public function delete($id)
    {
        PemutakhiranModel::where('id', $id)->delete();
        return response()->json();
    }
}
