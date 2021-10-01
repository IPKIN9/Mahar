@extends('Base.TemplateDash')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/vendors/choices.js/choices.min.css') }}" />
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Datatable Rencana Anggaran Biaya</h3>
            <p class="text-subtitle text-muted">Data di render berdasarkan pagination</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                name of user
            </nav>
        </div>
    </div>
</div>
<section class="section">
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-header">
                        <h5 class="text-success">Petunjuk</h5>
                        <br>
                        @if (session('status'))
                        <span class="badge bg-success">Success. {{ session('status') }}</span>
                        @endif
                        @if (session('error'))
                        <span class="badge bg-warning"><i class="fas fa-exclamation-triangle"></i>.
                            {{ session('error') }}</span>
                        @endif
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link @include('Error.Active')" id="table-tab" data-bs-toggle="tab"
                                    href="#table" role="tab" aria-controls="table" aria-selected="true">Tabel</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link @include('Error.AnActive') " id="formulir-tab" data-bs-toggle="tab"
                                    href="#formulir" role="tab" aria-controls="formulir"
                                    aria-selected="false">Formulir</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade @include('Error.TabsActive')" id="table" role="tabpanel"
                                aria-labelledby="table-tab">
                                <div style="margin-top: 30px;"></div>
                                <p class="card-text">Data yang diolah merupakan tanggung jawab admin, Pastikan data yang
                                    dimasukan sudah benar, tombol dengan logo ( <code><i class="far fa-edit"></i></code>
                                    )
                                    digunakan
                                    untuk merubah data.
                                    Sedangkan tombol dengan logo ( <code><i class="fas fa-backspace"></i></code> )
                                    digunakan
                                    untuk
                                    menghapus data secara permanent.
                                </p>
                                <div class="table-responsive" style="margin-top: 50px;">
                                    <table id="table-rab" class="table table-lg">
                                        <thead>
                                            <tr>
                                                <th style="width: 15px;">No.</th>
                                                <th>Kegiatan</th>
                                                <th>Jumlah Anggaran</th>
                                                <th style="width: 100px;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $no = 1;
                                            @endphp
                                            @foreach ($data['all'] as $d)
                                            <tr>
                                                <td style="width: 15px;">{{$no++}}</td>
                                                <td>{{$d->rkp_role->jenis_kegiatan}}</td>
                                                <td>{{$d->jumlah}}</td>
                                                <td style="width: 100px;">
                                                    <button type="button" id="btn-del" data-id="{{$d->id}}"
                                                        class="ml-1 btn icon icon-left btn-secondary"><i
                                                            class="fas fa-backspace"></i></button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade @include('Error.TabsAnActive')" id="formulir" role="tabpanel"
                                aria-labelledby="formulir-tab">
                                <div style="margin-top: 30px;"></div>
                                <h4 class="card-title">Tambah Data</h4>
                                <div class="card-body">
                                    <form action="{{route('rab.insert')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <input type="hidden" id="id_rkp" name="id_rkp">
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-12">
                                                <p><b>Perhatian</b> Periksa kembali data yang telah di masukan
                                                    sebelum
                                                    menekan
                                                    tombol kirim</p>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <fieldset>
                                                            <div class="form-group">
                                                                <label>Bidang</label>
                                                                <select name="id_bidang" id="select_bidang"
                                                                    class="choices form-select">
                                                                    <option value="" selected disabled>--Select--
                                                                    </option>
                                                                    @foreach ($data['bidang'] as $d)
                                                                    <option value="{{$d->id}}">{{$d->nama_bidang}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('id_bidang')
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <fieldset>
                                                            <div class="form-group">
                                                                <label>Sub Bidang</label>
                                                                <select name="sub_bidang" id="select_subbidang"
                                                                    class=" form-select">
                                                                    <option value="" selected disabled>--Select--
                                                                    </option>
                                                                </select>
                                                                @error('sub_bidang')
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div style="margin-top: 30px;"></div>
                                                <div class="row">
                                                    <div class="col-md-12 text-left">
                                                        <button type="button" disabled id="proses"
                                                            class="btn btn-secondary">Proses</button>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div style="margin-top: 30px;"></div>
                                                <div class="row" id="form-detail">
                                                    <div class="col-md-6">
                                                        <fieldset>
                                                            <div class="form-group">
                                                                <label for="">Kegiatan</label>
                                                                <textarea readonly required name="jenis_kegiatan"
                                                                    class="form-control" id="jkegiatan-add"
                                                                    rows="4"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Waktu Pelaksanaan</label>
                                                                <input readonly required name="pelaksanaan" type="text"
                                                                    class="form-control" id="pelaksanaan-add"
                                                                    placeholder="Input Here">
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <fieldset>
                                                            <div class="form-group">
                                                                <label for="">Keluaran</label>
                                                                <textarea required name="nama_pengeluaran"
                                                                    class="form-control" id="" rows="4"></textarea>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div style="margin-top: 30px;"></div>
                                                <hr>
                                                <div class="row">
                                                    <div class="card-body">
                                                        <div class="row mt-6">
                                                            <div class="col-sm-8">
                                                                <div class="col-sm-12 text-left">Uraian</div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="row">
                                                                    <div class="col-sm-12">Jumlah</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div style="margin-top: 30px;"></div>
                                                        <div id="detail-form">
                                                            <div class="row">
                                                                <div class="col-sm-8">
                                                                    <div class="row">
                                                                        <div class="col-sm-1 text-left">
                                                                            <button type="button" data-id="1"
                                                                                id="add-form"
                                                                                class="btn btn-sm icon-left btn-danger">
                                                                                <i class="fas fa-plus-circle"></i>
                                                                            </button>
                                                                            <input type="hidden" value="0"
                                                                                id="counter-up">
                                                                        </div>
                                                                        <div class="col-sm-11 text-left">
                                                                            <fieldset>
                                                                                <div class="form-group">
                                                                                    <input required name="uraian[]"
                                                                                        type="text" class="form-control"
                                                                                        id="" placeholder="Input Here">
                                                                                </div>
                                                                            </fieldset>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <fieldset>
                                                                                <div class="form-group">
                                                                                    <input required
                                                                                        name="detail_jumlah[]"
                                                                                        type="number"
                                                                                        class="form-control count-input"
                                                                                        id="jumlah1"
                                                                                        placeholder="Input Here">
                                                                                </div>
                                                                            </fieldset>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row" style="margin-top: 30px;"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row" style="margin-top: 30px;">
                                                    <div class="col-md-6" style="text-align: right">
                                                        <button type="button" id="hitung"
                                                            class="btn icon icon-left btn-secondary">
                                                            Hitung</button>
                                                    </div>
                                                    <div class="col-md-6 text-right" style="margin-top: -20px;">
                                                        <div class="row">
                                                            <div class="col-sm-8">
                                                                <fieldset>
                                                                    <div class="form-group">
                                                                        <label for="">Anggaran Yang Tersedia</label>
                                                                        <input required name="" readonly type="number"
                                                                            class="form-control" id="anggaran"
                                                                            placeholder="Input Here">
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <fieldset>
                                                                    <div class="form-group">
                                                                        <label for="">Total Biaya</label>
                                                                        <input required name="total_jumlah"
                                                                            type="number" readonly class="form-control"
                                                                            id="jumlah" placeholder="Input Here">
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top: 30px;">
                                                    <div class="col-md-6 col-md-6" style="text-align: right">
                                                        <button type="submit" class="btn icon icon-left btn-success"><i
                                                                class="fas fa-paper-plane"></i>
                                                            Kirim</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-1"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('js')
<script src="{{ asset('assets/vendors/choices.js/choices.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#table-rab').DataTable();

        $('#select_bidang').change(function()
        {
            let dataId = $('#select_bidang').val();
            let url = "getsubbidang/" + dataId;
            $.get(url, function(data)
            {
                $('#select_subbidang').html('');
                $.each(data, function(i,d)
                {
                    $('#select_subbidang').append(`
                        <option value="`+ d.sub_bidang +`">`+ d.sub_bidang +`</option>
                    `);
                });
            });
            $('#proses').prop('disabled', false)
        });

        $(document).on('click', '#proses', function()
        {
            $('#proses').html('Proses Ulang')
            let dataId = $('#select_bidang').val();
            let dataSub = $('#select_subbidang').val();
            let url = "getDetail/" + dataId;

            $.ajax({
                url: url,
                type: 'GET',
                data: { sub_bidang:dataSub },
                success: function(data)
                {
                    $('#jkegiatan-add').val(data.jenis_kegiatan);
                    $('#pelaksanaan-add').val(data.pelaksanaan);
                    $('#anggaran').val(data.biaya);
                    $('#id_rkp').val(data.id);
                }
            });
        });

        $(document).on('click', '#add-form', function()
        {
            let dataId = $('#counter-up').val();
            let up = parseInt(dataId) + 1;
            $('#counter-up').val(up);
            $('#detail-form').append(`
            <div class="row" id="remove-form`+up+`">
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-1 text-left">
                            <button id="remove-button-`+up+`" type="button"
                                class="btn btn-sm icon-left btn-warning">
                                <i class="fas fa-minus-circle"></i>
                            </button>
                        </div>
                        <div class="col-sm-11 text-left">
                            <fieldset>
                                <div class="form-group">
                                    <input required name="uraian[]"
                                        type="text" class="form-control"
                                        id="" placeholder="Input Here">
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <fieldset>
                                <div class="form-group">
                                    <input required
                                        name="detail_jumlah[]" type="number"
                                        class="form-control count-input" id="jumlah1-`+up+`"
                                        placeholder="Input Here">
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 30px;"></div>
                </div>
            </div>
            `);
            $(document).on('click', `#remove-button-`+up+``,function()
            {
                $("#remove-form"+up).remove();
            });
        });

        $(document).on('click', '#hitung', function()
        {
            $('#hitung').html('Hitung Ulang');
            $('#detail-form').each(function(){
            var totalPoints = 0;
            $(this).find('.count-input').each(function(){
                totalPoints += parseInt($(this).val());
            });
            $('#jumlah').val(totalPoints);
            });
        });

        $(document).on('click','#btn-del',function(){
            let dataId = $(this).data('id');
            Swal.fire({
            title: 'Anda Yakin?',
            text: "Data ini mungkin terhubung ke tabel yang lain!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "deletespecdata/" + dataId,
                        type: 'delete',
                        success: function () {
                            Swal.fire({
                                title: 'Hapus!',
                                text: 'Data berhasl di hapus.',
                                icon: 'success',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Oke'
                            }).then((result) => {
                                location.reload();
                            });
                        },
                        error: function () {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Ada yang salah!',
                            });
                        }
                    })
                }
            })
        });
    });
</script>
@endsection