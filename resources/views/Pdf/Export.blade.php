<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Emulating real sheets of paper in web documents (using HTML and CSS)">
    <title>Sheets of Paper</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/paper/sheets-of-paper-a4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
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
            <div class="col-lg-9">:</div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-lg-3" style="text-align: left; color: black; font-size: 10pt;">Sub Bidang</div>
            <div class="col-lg-9">:</div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-lg-3" style="text-align: left; color: black; font-size: 10pt;">Kegiatan</div>
            <div class="col-lg-9">:</div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-lg-3" style="text-align: left; color: black; font-size: 10pt;">Waktu Pelaksanaan</div>
            <div class="col-lg-9">:</div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-lg-3" style="text-align: left; color: black; font-size: 10pt;">Output/Keluaran</div>
            <div class="col-lg-9">:</div>
        </div>

        <div class="row" style="margin-top: 50px;">
            <table style="text-align: center;" class="table table-bordered">
                <thead style="font-size: 10px; color: black;">
                    <th>NO.</th>
                    <th>URAIAN</th>
                    <th>
                        <div class="row">
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    ANGGARAN
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">VOLUME</div>
                                <div class="col-sm-4">HARGA SATUAN</div>
                                <div class="col-sm-4">JUMLAH</div>
                            </div>
                        </div>
                    </th>
                </thead>
                <tbody style="font-size: 10px; color: black;">
                    <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>
                            <div class="row">
                                <div class="row">
                                    <div class="col-sm-4">VOLUME</div>
                                    <div class="col-sm-4">HARGA SATUAN</div>
                                    <div class="col-sm-4">JUMLAH</div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
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
            <div class="col-md-4">Nama</div>
            <div class="col-md-4">Nama</div>
            <div class="col-md-4">Nama</div>
        </div>
    </div>
    <script type="text/javascript">
        // window.print();
    </script>
</body>

</html>