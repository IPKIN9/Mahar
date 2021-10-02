<?php

namespace App\Http\Controllers;

use App\Http\Requests\RabRequest;
use App\Models\BidangModel;
use App\Models\DetailModel;
use App\Models\RabModel;
use App\Models\RkpModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;
use PDF;

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
            'id_rkp' => $request->id_rkp,
            'nama_pengeluaran' => $request->nama_pengeluaran,
            'jumlah' => $request->total_jumlah,
            'created_at' => $date,
            'updated_at' => $date,
        );
        RabModel::create($data);
        $where = RabModel::where('kode', $random)->value('id');
        $data2 = $request->all();
        foreach ($data2['uraian'] as $key => $value) {
            $data3 = array(
                'uraian' => $data2['uraian'][$key],
                'id_rab' => $where,
                'kode_detail' => $random,
                'detail_jumlah' => $data2['detail_jumlah'][$key],
                'created_at' => $date,
                'updated_at' => $date,
            );
            DetailModel::create($data3);
        }
        return back()->with('status', 'Data berhasil di tambahkan');
    }

    public function view($id)
    {
        $rab = RabModel::where('id', $id)->value('id_bidang');
        $sub = RkpModel::where('id_bidang', $rab)->get();
        $data = array(
            'rab' => RabModel::where('id', $id)->with('bidang_role', 'rkp_role')->first(),
            'detail' => DetailModel::where('id_rab', $id)->get(),
            'bidang' => BidangModel::all(),
            'sub' => $sub,
        );
        return view('Cms.EditRab')->with('data', $data);
    }

    public function update(Request $request)
    {
        // return dd($request->all());
        $date = Carbon::now();
        $random = Str::random(5);
        $date = Carbon::now();
        $idRab = $request->id_rab;
        $dataRab = array(
            'jumlah' => $request->total_jumlah,
            'nama_pengeluaran' => $request->nama_pengeluaran,
            'updated_at' => $date,
        );
        RabModel::where('id', $idRab)->update($dataRab);

        $data = $request->all();
        foreach ($data['id_detail'] as $key => $value) {
            // $id = $data['id_detail'][$key];

            if ($request->del == null) {
                if ($request->uraian_baru == null) {
                    return dd('end1');
                } else {
                    return dd('execution');
                }
            } else {
                $del = $data['del'][$key];
                if ($del == "true") {
                    // hapus code
                    if ($request->uraian_baru == null) {
                        $id = $data['id_detail'][$key];
                        $save1 = array(
                            'uraian' => $data['uraian'][$key],
                            'detail_jumlah' => $data['detail_biaya'][$key],
                            'updated_at' => $date,
                        );
                        DetailModel::where('id', $id)->update($save1);
                    } else {
                        $id = $data['id_detail'][$key];
                        $save1 = array(
                            'uraian' => $data['uraian'][$key],
                            'detail_jumlah' => $data['detail_biaya'][$key],
                            'updated_at' => $date,
                        );
                        DetailModel::where('id', $id)->update($save1);
                        $save2 = array(
                            'uraian' => $data['uraian_baru'][$key],
                            'kode_detail' => $random,
                            'detail_jumlah' => $data['detail_biaya_baru'][$key],
                            'created_at' => $date,
                            'updated_at' => $date,
                        );
                        DetailModel::create($save2);
                    }
                }
            }








            // if ($request->del == null) {
            //     if ($data['id_detail'][$key] == null) {
            //         $random = Str::random(5);
            //         $data2 = array(
            //             'kode_detail' => $random,
            //             'id_rab' => $idRab,
            //             'uraian' => $data['uraian'][$key],
            //             'detail_jumlah' => $data['detail_biaya'][$key],
            //             'created_at' => $date,
            //             'updated_at' => $date,
            //         );
            //         DetailModel::create($data2);
            //     } else {
            //         $del = $data['del'][$key];
            //         $random = Str::random(5);
            //         $data2 = array(
            //             'uraian' => $data['uraian'][$key],
            //             'detail_jumlah' => $data['detail_biaya'][$key],
            //             'updated_at' => $date,
            //         );
            //         DetailModel::where('id', $id)->update($data2);
            //     }
            // }
        }
        // return redirect(route('rab.index'))->with('status', 'Perubahan Data Berhasil');
    }

    public function delete($id)
    {
        $where = DetailModel::where('id_rab', $id)->get();
        foreach ($where as $d) {
            DetailModel::where('id', $d->id)->delete();
        }
        RabModel::where('id', $id)->delete();
        return response()->json();
    }

    public function pdfPrint($id)
    {
        Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format($expression,0,',','.'); ?>";
        });
        $rab = RabModel::where('id', $id)->with('bidang_role', 'rkp_role')->first();
        $detail = DetailModel::where('id_rab', $id)->get();
        $sum = $detail->sum('detail_jumlah');
        $today = Carbon::now()->isoFormat('D MMMM Y');
        $data = array(
            'rab' => $rab,
            'detail' => $detail,
            'count' => $sum,
            'date' => $today,
        );
        // return view('Pdf.RabPdf')->with('data', $data);
        $pdf = PDF::loadView('Pdf.RabPdf', ['data' => $data]);
        return $pdf->stream();
    }
}
