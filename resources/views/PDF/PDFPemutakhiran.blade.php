<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dokumen Pemutakhiran</title>
    <style type="text/css">
        body {
            text-align: center
        }

        #outtable {
            padding: 20px;
            border: 1px solid #e3e3e3;
            width: 600px;
            border-radius: 5px;
        }

        .short {
            width: 50px;
        }

        .normal {
            width: 150px;
        }

        table {
            border-collapse: collapse;
            font-family: arial;
            color: black;
            border: 1px;
        }

        thead th {
            text-align: left;
            padding: 10px;
        }

        tbody td {
            border-top: 1px solid #e3e3e3;
            padding: 10px;
        }

        tbody tr:nth-child(even) {
            background: #F6F5FA;
        }

        tbody tr:hover {
            background: #EAE9F5
        }
    </style>
</head>

<body>
    <div class="table-responsive" style="margin-top: 50px;">
        <h3 class="text-center">HASIL PEMUTAKHIRAN DATA PENGGUNAAN ANGGARAN DANA DESA <br> DESA POMAYAGON KECAMATAN
            MOMUNU KABUPATEN BUOL
        </h3>
        <hr>

        <table id="table-pemutakhiran" class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Jenis Temuan</th>
                    <th>Pagu Anggaran</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($data as $d)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$d->jenis_temuan}}</td>
                    <td>Rp. {{$d->pagu_anggaran}}</td>
                    <td>{{$d->ket}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</html>