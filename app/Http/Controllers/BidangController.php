<?php

namespace App\Http\Controllers;

use App\Http\Requests\BidangRequest;
use App\Models\BidangModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Throwable;

class BidangController extends Controller
{
    public function index()
    {
        $data = BidangModel::all();
        return view('Cms.Bidang')->with('data', $data);
    }

    public function insert(BidangRequest $request)
    {
        $date = Carbon::now();
        $data = array(
            'nama_bidang' => $request->nama_bidang,
            'creatd_at' => $date,
            'updated_at' => $date,
        );
        try {
            BidangModel::create($data);
            return back()->with('status', 'Data berhasil ditambahkan');
        } catch (Throwable $e) {
            report($e);
            return back()->with('error', $e);
        }
    }

    public function edit($id)
    {
        $result = BidangModel::where('id', $id)->first();
        return response()->json($result);
    }

    public function update(BidangRequest $request)
    {
        $id = $request->id;
        $date = Carbon::now();
        $data = array(
            'nama_bidang' => $request->nama_bidang,
            'updated_at' => $date,
        );
        try {
            BidangModel::where('id', $id)->update($data);
            return back()->with('status', 'Data berhasil diubah');
        } catch (Throwable $e) {
            report($e);
            return back()->with('error', $e);
        }
    }

    public function delete($id)
    {
        BidangModel::where('id', $id)->delete();
        return response()->json();
    }
}
