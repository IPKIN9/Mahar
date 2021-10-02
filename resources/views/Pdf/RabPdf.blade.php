<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Emulating real sheets of paper in web documents (using HTML and CSS)">
    <title>Export Pdf</title>
    <link rel="stylesheet" type="text/css" href="../../assets/paper/sheets-of-paper-a4.css">
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            line-height: 2;

        }

        .column {
            float: left;
            width: 33.3%;
        }

        .col-4 {
            float: left;
            width: 30%;
            padding: 10px;
            height: 10px;
        }

        .col-8 {
            float: left;
            width: 70%;
            padding: 10px;
            height: 10px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .center {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        table {
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 12px;
        }
    </style>
</head>

<body class="document">
    <div class="page" contenteditable="true">
        <div class="row" style="text-align: center">
            <div class="">
                <h5>RENCANA ANGGARAN BIAYA (RAB)</h5>
                <h5 style="margin-top: -15px;">PEMERINTAH DESA POMAYAGON KECAMATAN MOMUNU</h5>
                <h5 style="margin-top: -15px;">TAHUN ANGGARAN {{ now()->year }}</h5>
            </div>
            <hr style=" height: 2px; margin-top: -15px;">
        </div>
        <div class="row" style="font-size: 12px; text-transform: capitalize;">
            <div style="margin-bottom: 0px;">
                <div class="col-4">Bidang</div>
                <div class="col-8">: {{$data['rab']->bidang_role->nama_bidang}}</div>
            </div>
        </div>
        <div class="row" style="font-size: 12px; text-transform: capitalize;">
            <div>
                <div class="col-4">Sub Bidang</div>
                <div class="col-8">: {{$data['rab']->rkp_role->sub_bidang}}</div>
            </div>
        </div>
        <div class="row" style="font-size: 12px; text-transform: capitalize;">
            <div>
                <div class="col-4">Kegiatan</div>
                <div class="col-8">: {{$data['rab']->rkp_role->jenis_kegiatan}}</div>
            </div>
        </div>
        <div class="row" style="font-size: 12px; text-transform: capitalize;">
            <div>
                <div class="col-4">Waktu Pelaksanaan</div>
                <div class="col-8">: {{$data['rab']->rkp_role->pelaksanaan}}</div>
            </div>
        </div>
        <div class="row" style="font-size: 12px; text-transform: capitalize;">
            <div>
                <div class="col-4">Output/Pengeluaran</div>
                <div class="col-8">: {{$data['rab']->nama_pengeluaran}}</div>
            </div>
        </div>
        <table class="center" style="margin-top: 15px;">
            <tr>
                <th>No</th>
                <th>URAIAN</th>
                <th>ANGGARAN</th>
            </tr>
            @php
            $no=1;
            @endphp
            @foreach ($data['detail'] as $d)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$d->uraian}}</td>
                <td>@currency($d->detail_jumlah)</td>
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td><b>TOTAL ANGGARAN</b></td>
                <td><b>@currency($data['count'])</b></td>
            </tr>
        </table>
        <div class="row" style="text-align: center; font-size: 12px; margin-top: 50px; height: 120px;">
            <div class="column">
                Disetujui, <br> KEPALA DESA
            </div>
            <div class="column">Telah Diverifikasi <br> SEKRETARIS DESA</div>
            <div class="column">DESA POMAYAGON, {{$data['date']}} <br>Pelaksana Kegiatan Anggaran</div>
        </div>
        <div class="row" style="text-align: center; font-size: 12px;">
            <div class="column">YUNU S M. SARIUH</div>
            <div class="column">SYAMSUDIN</div>
            <div class="column">HUSAIN ABDULLAH</div>
        </div>
    </div>
    <script type="text/javascript">
    </script>
</body>

</html>