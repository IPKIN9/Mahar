<?php

namespace App\Http\Controllers;

use App\Http\Requests\RkpRequest;
use App\Models\BidangModel;
use App\Models\LokasiModel;
use App\Models\RkpModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Throwable;

class RkpController extends Controller
{
    public function index()
    {
        $data = array(
            'all' => RkpModel::all(),
            'bidang' => BidangModel::all(),
            'lokasi' => LokasiModel::all(),
        );
        return view('Cms.Rkp')->with('data', $data);
    }

    public function insert(RkpRequest $request)
    {
        $date = Carbon::now();
        $data = array(
            'id_bidang' => $request->id_bidang,
            'sub_bidang' => $request->sub_bidang,
            'jenis_kegiatan' => $request->jenis_kegiatan,
            'id_lokasi' => $request->id_lokasi,
            'perkiraan_volume' => $request->perkiraan_volume,
            'sasaran' => $request->sasaran,
            'pelaksanaan' => $request->pelaksanaan,
            'biaya' => $request->biaya,
            'sumber' => $request->sumber,
            'swa_kelola' => $request->swa_kelola,
            'kerja_sama' => $request->kerja_sama,
            'pihak_ketiga' => $request->pihak_ketiga,
            'rencana_pelaksanaan' => $request->rencana_pelaksanaan,
            'created_at' => $date,
            'updated_at' => $date,
        );
        try {
            RkpModel::create($data);
            return back()->with('status', 'Data berhasil ditambahkan');
        } catch (Throwable $e) {
            report($e);
            return back()->with('error', $e);
        }
    }

    public function edit($id)
    {
        $result = RkpModel::where('id', $id)->first();
        return response()->json($result);
    }

    public function update(RkpRequest $request)
    {
        $id = $request->id;
        $date = Carbon::now();
        $data = array(
            'id_bidang' => $request->id_bidang,
            'sub_bidang' => $request->sub_bidang,
            'jenis_kegiatan' => $request->jenis_kegiatan,
            'id_lokasi' => $request->id_lokasi,
            'perkiraan_volume' => $request->perkiraan_volume,
            'sasaran' => $request->sasaran,
            'pelaksanaan' => $request->pelaksanaan,
            'biaya' => $request->biaya,
            'sumber' => $request->sumber,
            'swa_kelola' => $request->swa_kelola,
            'kerja_sama' => $request->kerja_sama,
            'pihak_ketiga' => $request->pihak_ketiga,
            'rencana_pelaksanaan' => $request->rencana_pelaksanaan,
            'updated_at' => $date,
        );
        try {
            RkpModel::where('id', $id)->update($data);
            return back()->with('status', 'Data berhasil diubah');
        } catch (Throwable $e) {
            report($e);
            return back()->with('error', $e);
        }
    }

    public function delete($id)
    {
        RkpModel::where('id', $id)->delete();
        return response()->json();
    }
}
