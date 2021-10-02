@extends('Base.TemplateDash')
@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Datatable Pemutakhiran</h3>
            <p class="text-subtitle text-muted">Data di render berdasarkan pagination</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                @include('Base.User')
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
                        <div class="row">
                            <div class="col-md-10">
                                <h5 class="text-success">Petunjuk</h5>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-info" target="blank" href="{{route('pdf')}}">Export to PDF</a>
                            </div>
                        </div>
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
                                    <table id="table-pemutakhiran" class="table table-lg">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Jenis Temuan</th>
                                                <th>Pagu Anggaran</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
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
                                                <td style="width: 100px;">
                                                    <button type="button" id="btn-edit" data-id="{{$d->id}}"
                                                        class="btn icon icon-left btn-primary"><i
                                                            class="far fa-edit"></i></button>
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
                                    <form action="{{route('pemutakhiran.insert')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-12">
                                                <p><b>Perhatian</b> Periksa kembali data yang telah di masukan
                                                    sebelum
                                                    menekan
                                                    tombol kirim</p>
                                                <div class="row">
                                                    <div class="col-md-4" style="margin-top: 10px;">
                                                        <fieldset>
                                                            <div class="form-group">
                                                                <label for="jenis_temuan">Jenis Temuan</label>
                                                                <input type="text" class="form-control"
                                                                    name="jenis_temuan" placeholder="Input Here">
                                                                @error('jenis_temuan')
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-4" style="margin-top: 10px;">
                                                        <fieldset>
                                                            <div class="form-group">
                                                                <label for="pagu_anggaran">Pagu Anggaran</label>
                                                                <input type="text" class="form-control"
                                                                    name="pagu_anggaran" placeholder="Input Here">
                                                                @error('pagu_anggaran')
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-4" style="margin-top: 10px;">
                                                        <fieldset>
                                                            <div class="form-group">
                                                                <label for="ket">Keterangan</label>
                                                                <input type="text" class="form-control" name="ket"
                                                                    placeholder="Input Here">
                                                                @error('ket')
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div style="margin-top: 30px;"></div>
                                                <div style="margin-top: 30px;"></div>
                                                <div class="row">
                                                    <div class="col-md-12 text-left">
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
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#table-pemutakhiran').DataTable();

        $(document).on('click', '#btn-edit', function()
        {
            let dataId = $(this).data('id');
            let url = "getspecdata/" + dataId;
            $.get(url, function(data){
                $('.modal-title').html('Perubahan Data');
                $('.modal-body').html('');
                $('.modal-body').append(`
                <div class="row">
                    <div class="col-md-4" style="margin-top: 10px;">
                        <fieldset>
                            <div class="form-group">
                                <label for="jenis_temuan">Jenis Temuan</label>
                                <input type="hidden" class="form-control"
                                    name="id" id="id" value="`+data.id+`">
                                <input type="text" class="form-control"
                                    name="jenis_temuan" id="jenis_temuan" value="`+data.jenis_temuan+`">
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-4" style="margin-top: 10px;">
                        <fieldset>
                            <div class="form-group">
                                <label for="pagu_anggaran">Pagu Anggaran</label>
                                <input type="text" class="form-control" name="pagu_anggaran" id="pagu_anggaran"
                                    value="`+data.pagu_anggaran+`">
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-4" style="margin-top: 10px;">
                        <fieldset>
                            <div class="form-group">
                                <label for="ket">Keterangan</label>
                                <input type="text" class="form-control" name="ket" id="ket"
                                    value="`+data.ket+`">
                            </div>
                        </fieldset>
                    </div>
                </div>
                `);
                $('#univModal').modal('show');
                $('#form-edit').attr('action',`{{route('pemutakhiran.update')}}`);
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