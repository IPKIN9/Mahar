<?php

namespace App\Http\Controllers;

use App\Http\Requests\RabRequest;
use App\Models\BidangModel;
use App\Models\RabModel;
use App\Models\RkpModel;
use Illuminate\Http\Request;

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
        ])->with('bidang_role', 'lokasi_role')->get();
        return response()->json($result);
    }

    public function insert(RabRequest $request)
    {
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
