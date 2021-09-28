<?php

namespace App\Http\Controllers;

use App\Http\Requests\RabRequest;
use App\Models\BidangModel;
use App\Models\RabModel;
use App\Models\RkpModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RabController extends Controller
{
    public function index()
    {
        $data = array(
            'all' => RabModel::all(),
            'bidang' => BidangModel::all()
        );
        return view('Cms.Rab')->with('data', $data);
    }

    public function sub_bidang($id)
    {
        $result = RkpModel::where('id_bidang', $id)->with('bidang_role', 'lokasi_role')->get();
        if ($result->count() > 0) {
            return response()->json($result);
        }
        return response()->json('error');
    }

    public function detail(Request $request, $id)
    {
        $result = RkpModel::where([
            ['id_bidang', $id],
            ['sub_bidang', $request->sub_bidang]
        ])->with('bidang_role', 'lokasi_role')->first();
        return response()->json($result);
    }

    public function insert(Request $request)
    {

        $date = Carbon::now();
        $random = Str::random(5);
        $data = array(
            'kode' => $random,
            'id_bidang' => $request->id_bidang,
            'nama_pengeluaran' => $request->nama_pengeluaran,
            'jumlah' => $request->total_jumlah,
            'created_at' => $date,
            'updated_at' => $date,
        );
        return dd($request->all());
    }

    public function edit($id)
    {
    }

    public function update(RabRequest $request)
    {
    }

    public function delete($id)
    {
    }
}
