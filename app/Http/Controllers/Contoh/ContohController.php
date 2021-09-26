<?php

namespace App\Http\Controllers\Contoh;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContohRequest;
use App\Models\ContohModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Throwable;

class ContohController extends Controller
{
    public function index()
    {
        $data = ContohModel::all();
        return view('Contoh.Contoh')->with('data', $data);
    }

    public function insert(ContohRequest $request)
    {
        $date = Carbon::now();
        $data = array(
            'contoh' => $request->contoh,
            'creatd_at' => $date,
            'updated_at' => $date,
        );
        try {
            ContohModel::create($data);
            return back()->with('status', 'Data berhasil ditambahkan');
        } catch (Throwable $e) {
            report($e);
            return back()->with('error', $e);
        }
    }

    public function edit($id)
    {
        $result = ContohModel::where('id', $id)->first();
        return response()->json($result);
    }

    public function update(ContohRequest $request)
    {
        $id = $request->id;
        $date = Carbon::now();
        $data = array(
            'contoh' => $request->contoh,
            'updated_at' => $date,
        );
        try {
            ContohModel::where('id', $id)->update($data);
            return back()->with('status', 'Data berhasil diubah');
        } catch (Throwable $e) {
            report($e);
            return back()->with('error', $e);
        }
    }

    public function delete($id)
    {
        ContohModel::where('id', $id)->delete();
        return response()->json();
    }
}
