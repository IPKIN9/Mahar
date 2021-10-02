<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dokumen RKP</title>
    {{--  <link rel="stylesheet" type="text/css" href="assets/paper/sheets-of-paper-a4.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">  --}}
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
</head>

<body>
    <h3 style="text-align: center; font-family:'Times New Roman', Times, serif">Rencana Kerja Pemerintah Desa <br> Tahun
        {{$data['date']}}
    </h3>
    <table>
        <tr>
            <td>Desa</td>
            <td>:</td>
            <td> Pemerintah Desa Pomayagon</td>
        </tr>
        <tr>
            <td>Kecamatan</td>
            <td>:</td>
            <td>Kecamatan Momunu</td>
        </tr>
        <tr>
            <td>Kabupaten</td>
            <td>:</td>
            <td>Kabupaten Buol</td>
        </tr>
        <tr>
            <td>Provinsi</td>
            <td>:</td>
            <td>Provinsi Sulawesi Tengah</td>
        </tr>
    </table>
    <div>
        <table border="0.5">
            <tr style="text-align: center;">
                <td rowspan="2">KD</td>
                <td colspan="2">BIDANG/SUB BIDANG/ JENIS KEGIATAN</td>
                <td rowspan="2">LOKASI</td>
                <td rowspan="2">PERKIRAAN <br> VOLUME</td>
                <td rowspan="2">SASARAN</td>
                <td rowspan="2">WAKTU <br> PELAKSANAAN</td>
                <td colspan="2">PERKIRAAN BIAYA & SUMBERDANA</td>
                <td colspan="3">POLA PELAKSANAAN</td>
            </tr>
            <tr style="text-align: center;">
                <td>BIDANG/SUB BIDANG</td>
                <td>JENIS KEGIATAN</td>
                <td>JUMLAH <br> (RUPIAH)</td>
                <td>SUMBER</td>
                <td>SWA <br> KELOLA</td>
                <td>KERJA<br>SAMA</td>
                <td>PIHAK<br>KETIGA</td>
            </tr>
            @php
            $no = 1;
            @endphp
            @foreach ($data['all'] as $d)
            <tr>
                <td>{{$no++}}</td>
                <td colspan="11">{{$d->bidang_role->nama_bidang}}</td>
            </tr>
            <tr>
                <td></td>
                <td>{{$d->sub_bidang}}</td>
                <td>{{$d->jenis_kegiatan}}</td>
                <td>{{$d->lokasi_role->nama_lokasi}}</td>
                <td style="text-align: center;">{{$d->perkiraan_volume}} Orang</td>
                <td>{{$d->sasaran}}</td>
                <td>{{$d->pelaksanaan}}</td>
                <td>Rp. {{$d->biaya}}</td>
                <td>{{$d->sumber}}</td>
                <td style="text-align: center;">{{$d->swa_kelola}}</td>
                <td style="text-align: center;">{{$d->kerja_sama}}</td>
                <td style="text-align: center;">{{$d->pihak_ketiga}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>