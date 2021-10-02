<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Emulating real sheets of paper in web documents (using HTML and CSS)">
    <title>Sheets of Paper</title>
    <link rel="stylesheet" type="text/css" href="http://127.0.0.1:8000/assets/paper/sheets-of-paper-a4.css">
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            font-family: "Roboto", -apple-system, "San Francisco", "Segoe UI", "Helvetica Neue", sans-serif;
            font-size: 12pt;
            background-color: #eee;
        }
    </style>
</head>

<body class="document">
    <div class="page" contenteditable="true">
        <center>
            <h5 style="font-size: 10pt; color: black;">RENCANA ANGGARAN BIAYA (RAB)</h5>
            <br>
            <h5 style="margin-top: -17px; font-size: 10pt; color: black;">PEMERINTAH DESA POMAYAGON KECAMATAN MOMUNU
            </h5>
            <br>
            <h5 style="margin-top: -17px; font-size: 10pt; color: black;">TAHUN ANGGARAN 2019</h5>
        </center>
        <div class="row" style="margin-top: 50px;">
            <div class="col-lg-3" style="text-align: left; color: black; font-size: 10pt;">Bidang</div>
            <div class="col-lg-9" style="text-align: left; color: black; font-size: 10pt;">:
                {{$data['rab']->bidang_role->nama_bidang}}</div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-lg-3" style="text-align: left; color: black; font-size: 10pt;">Sub Bidang</div>
            <div class="col-lg-9" style="text-align: left; color: black; font-size: 10pt;">:
                {{$data['rab']->rkp_role->sub_bidang}}
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-lg-3" style="text-align: left; color: black; font-size: 10pt;">Kegiatan</div>
            <div class="col-lg-9" style="text-align: left; color: black; font-size: 10pt;">:
                {{$data['rab']->rkp_role->jenis_kegiatan}}
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-lg-3" style="text-align: left; color: black; font-size: 10pt;">Waktu Pelaksanaan</div>
            <div class="col-lg-9" style="text-align: left; color: black; font-size: 10pt;">:
                {{$data['rab']->rkp_role->pelaksanaan}}
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-lg-3" style="text-align: left; color: black; font-size: 10pt;">Output/Keluaran</div>
            <div class="col-lg-9" style="text-align: left; color: black; font-size: 10pt;">:
                {{$data['rab']->nama_pengeluaran}}
            </div>
        </div>

        <div class="row" style="margin-top: 50px;">
            <table style="text-align: center;" class="table table-bordered">
                <thead style="font-size: 10px; color: black;">
                    <th>NO.</th>
                    <th>URAIAN</th>
                    <th>ANGGARAN</th>
                </thead>
                @php
                $no=1;
                @endphp
                <tbody style="font-size: 10px; color: black;">
                    @foreach ($data['detail'] as $d)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$d->uraian}}</td>
                        <td>@currency($d->detail_jumlah)</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row" style="font-size: 12px; font-weight: bold; color: black;">
            <div class="col-md-8"></div>
            <div class="col-md-4" style="text-align: center">Total Anggaran : @currency($data['rab']->jumlah)</div>
        </div>
        <div class="row"
            style="margin-top: 100px; text-align: center; color: black; font-size: 10px; font-weight: bold;">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-sm-12">Disetujui,</div>
                </div>
                <div class="row">
                    <div class="col-sm-12">KEPALA DESA</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-sm-12">Telah Diverifikasi</div>
                </div>
                <div class="row">
                    <div class="col-sm-12">SEKRETARIS DESA</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-sm-12">DESA PAMAYAGON, 22 OKTOBER 2019</div>
                </div>
                <div class="row">
                    <div class="col-sm-12">Pelaksana Kegiatan Anggaran,</div>
                </div>
            </div>
        </div>
        <div class="row"
            style="margin-top: 120px; text-align: center; color: black; font-size: 10px; font-weight: bold;">
            <div class="col-md-4">YUNUS S M. SARIUH</div>
            <div class="col-md-4">SYAMSUDIN</div>
            <div class="col-md-4">HUSAIN ABDULAH</div>
        </div>
    </div>
    <script type="text/javascript">
        // window.print();
    </script>
</body>

</html>