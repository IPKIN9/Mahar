@extends('Base.TemplateDash')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/vendors/choices.js/choices.min.css') }}" />
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Datatable Rencana Kerja Pemerintahan</h3>
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
                        <div class="row">
                            <div class="col-md-10">
                                <h5 class="text-success">Petunjuk</h5>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-info" target="blank" href="{{route('rkp.pdf')}}">Export to PDF</a>
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
                                    <table id="table-rkp" class="table table-lg">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Bidang</th>
                                                <th>Sub Bidang</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $no = 1;
                                            @endphp
                                            @foreach ($data['all'] as $d)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$d->bidang_role->nama_bidang}}</td>
                                                <td>{{$d->sub_bidang}}</td>
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
                                    <form action="{{route('rkp.insert')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-12">
                                                <p><b>Perhatian</b> Periksa kembali data yang telah di masukan
                                                    sebelum
                                                    menekan
                                                    tombol kirim</p>
                                                <div class="row">
                                                    <div class="col-md-6 mb-4" style="margin-top: 10px;">
                                                        <fieldset>
                                                            <div class="form-group">
                                                                <label>Bidang</label>
                                                                <select name="id_bidang" class="choices form-select">
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
                                                    <div class="col-md-6" style="margin-top: 10px;">
                                                        <fieldset>
                                                            <div class="form-group">
                                                                <label for="">Sub Bidang</label>
                                                                <input name="sub_bidang" type="text"
                                                                    class="form-control" id="" placeholder="Input Here">
                                                                @error('sub_bidang')
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div style="margin-top: 30px;"></div>
                                                <div class="row">
                                                    <div class="col-md-6" style="margin-top: 10px;">
                                                        <fieldset>
                                                            <div class="form-group">
                                                                <label for="">Jenis Kegiatan</label>
                                                                <textarea name="jenis_kegiatan" class="form-control"
                                                                    id="" rows="6"></textarea>
                                                                @error('jenis_kegiatan')
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-6" style="margin-top: 10px;">
                                                        <fieldset>
                                                            <div class="form-group">
                                                                <label>Lokasi</label>
                                                                <select name="id_lokasi" class="choices form-select">
                                                                    <option value="" selected disabled>--Select--
                                                                    </option>
                                                                    @foreach ($data['lokasi'] as $d)
                                                                    <option value="{{$d->id}}">{{$d->nama_lokasi}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('id_lokasi')
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group" style="margin-top: 45px;">
                                                                <label for="">Perkiraan Volume</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="number" name="perkiraan_volume"
                                                                        class="form-control" placeholder="Input Here"
                                                                        aria-label="Recipient's username"
                                                                        aria-describedby="basic-addon2">
                                                                    <span class="input-group-text"
                                                                        id="basic-addon2">Orang</span>
                                                                </div>
                                                                @error('perkiraan_volume')
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div style="margin-top: 30px;"></div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-4" style="margin-top: 10px;">
                                                        <fieldset>
                                                            <div class="form-group">
                                                                <label for="">Sasaran</label>
                                                                <input name="sasaran" type="text" class="form-control"
                                                                    id="" placeholder="Input Here">
                                                                @error('sasaran')
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-6" style="margin-top: 10px;">
                                                        <fieldset>
                                                            <div class="form-group">
                                                                <label for="">Waktu Pelaksanaan</label>
                                                                <input name="pelaksanaan" type="text"
                                                                    class="form-control" id="">
                                                                @error('pelaksanaan')
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div style="margin-top: 30px;"></div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-4" style="margin-top: 10px;">
                                                        <fieldset>
                                                            <div class="form-group">
                                                                <label for="">Biaya</label>
                                                                <input name="biaya" type="number" class="form-control"
                                                                    id="" placeholder="Input Here">
                                                                @error('biaya')
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-6" style="margin-top: 10px;">
                                                        <fieldset>
                                                            <div class="form-group">
                                                                <label for="">Sumber</label>
                                                                <select name="sumber" class="form-select" id="">
                                                                    <option selected disabled>--Select--</option>
                                                                    <option value="dds">DDS</option>
                                                                    <option value="add">ADD</option>
                                                                </select>
                                                                @error('sumber')
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div style="margin-top: 30px;"></div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-6" style="margin-top: 10px;">
                                                        <fieldset>
                                                            <div class="form-group">
                                                                <label for="">Rencana Pelaksanaan</label>
                                                                <input name="rencana_pelaksanaan" type="date"
                                                                    class="form-control" id="" placeholder="Input Here">
                                                                @error('rencana_pelaksanaan')
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div style="margin-top: 30px;"></div>
                                                <div class="row">
                                                    <div class="col-md-4" style="margin-top: 10px;">
                                                        <fieldset>
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="sel_swakelola">
                                                                <input value="0" name="swa_kelola" type="hidden"
                                                                    id="swakelola">
                                                                <label class="form-check-label" for="">Swa
                                                                    Kelola</label>
                                                                @error('swa_kelola')
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-4" style="margin-top: 10px;">
                                                        <fieldset>
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="sel_kerja_sama">
                                                                <input value="0" name="kerja_sama" type="hidden"
                                                                    id="kerja_sama">
                                                                <label class="form-check-label" for="">Kerjasama</label>
                                                                @error('kerja_sama')
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-4" style="margin-top: 10px;">
                                                        <fieldset>
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="sel_edit_pihak">
                                                                <input value="0" name="pihak_ketiga" type="hidden"
                                                                    id="pihak_ketiga">
                                                                <label class="form-check-label" for="">Pihak
                                                                    Ketiga</label>
                                                                @error('pihak_ketiga')
                                                                <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
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
<script src="{{ asset('assets/vendors/choices.js/choices.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#table-rkp').DataTable();

        $('#sel_swakelola').change(function()
        {
            if ($('#sel_swakelola').is(':checked')) {
            $('#swakelola').val(1);
            } else {
                $('#swakelola').val(0);
            }
        });

        $('#sel_kerja_sama').change(function()
        {
            if ($('#sel_kerja_sama').is(':checked')) {
            $('#kerja_sama').val(1);
            } else {
                $('#kerja_sama').val(0);
            }
        });

        $('#sel_pihak_ketiga').change(function()
        {
            if ($('#sel_pihak_ketiga').is(':checked')) {
            $('#pihak_ketiga').val(1);
            } else {
                $('#pihak_ketiga').val(0);
            }
        });

        $(document).on('click', '#btn-edit', function()
        {
            let dataId = $(this).data('id');
            let url = "getspecdata/" + dataId;
            $.get(url, function(data){
                $('.modal-title').html('Perubahan Data');
                $('.modal-body').html('');
                $('.modal-body').append(`

                <div class="card-body anyClass" style="height:400px;">
                    <input value="`+ data.id +`" name="id" type=""hidden>
                    <div class="row">
                        <div class="col-md-1"></div>    
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6 mb-4" style="margin-top: 10px;">
                                    <fieldset>
                                        <div class="form-group">
                                            <label>Bidang</label>
                                            <select name="id_bidang" id="edit_bidang" class="choices form-select">
                                                <option value="" selected disabled>--Select--
                                                </option>
                                                @foreach ($data['bidang'] as $d)
                                                <option value="{{$d->id}}">{{$d->nama_bidang}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-6" style="margin-top: 10px;">
                                    <fieldset>
                                        <div class="form-group">
                                            <label for="">Sub Bidang</label>
                                            <input id="edit_sub" name="sub_bidang" type="text"
                                                class="form-control" id="" placeholder="Input Here">
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div style="margin-top: 30px;"></div>
                            <div class="row">
                                <div class="col-md-6" style="margin-top: 10px;">
                                    <fieldset>
                                        <div class="form-group">
                                            <label for="">Jenis Kegiatan</label>
                                            <textarea id="edit_jkegiatan" name="jenis_kegiatan" class="form-control"
                                                id="" rows="6"></textarea>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-6" style="margin-top: 10px;">
                                    <fieldset>
                                        <div class="form-group">
                                            <label>Lokasi</label>
                                            <select id="edit_lokasi" name="id_lokasi" class="choices form-select">
                                                <option value="" selected disabled>--Select--
                                                </option>
                                                @foreach ($data['lokasi'] as $d)
                                                <option value="{{$d->id}}">{{$d->nama_lokasi}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group" style="margin-top: 45px;">
                                            <label for="">Perkiraan Volume</label>
                                            <div class="input-group mb-3">
                                                <input id="edit_volume" type="number" name="perkiraan_volume"
                                                    class="form-control" placeholder="Input Here"
                                                    aria-label="Recipient's username"
                                                    aria-describedby="basic-addon2">
                                                <span class="input-group-text"
                                                    id="basic-addon2">Orang</span>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div style="margin-top: 30px;"></div>
                            <div class="row">
                                <div class="col-md-6 mb-4" style="margin-top: 10px;">
                                    <fieldset>
                                        <div class="form-group">
                                            <label for="">Sasaran</label>
                                            <input id="edit_sasaran" name="sasaran" type="text" class="form-control"
                                                id="" placeholder="Input Here">
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-6" style="margin-top: 10px;">
                                    <fieldset>
                                        <div class="form-group">
                                            <label for="">Waktu Pelaksanaan</label>
                                            <input id="edit_pelaksanaan" name="pelaksanaan" type="text"
                                                class="form-control" id="">
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div style="margin-top: 30px;"></div>
                            <div class="row">
                                <div class="col-md-6 mb-4" style="margin-top: 10px;">
                                    <fieldset>
                                        <div class="form-group">
                                            <label for="">Biaya</label>
                                            <input id="edit_biaya" name="biaya" type="number" class="form-control"
                                                id="" placeholder="Input Here">
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-6" style="margin-top: 10px;">
                                    <fieldset>
                                        <div class="form-group">
                                            <label for="">Sumber</label>
                                            <select id="edit_sumber" name="sumber" class="form-select" id="">
                                                <option selected disabled>--Select--</option>
                                                <option value="dds">DDS</option>
                                                <option value="add">ADD</option>
                                            </select>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div style="margin-top: 30px;"></div>
                            <div class="row">
                                <div class="col-md-6 mb-6" style="margin-top: 10px;">
                                    <fieldset>
                                        <div class="form-group">
                                            <label for="">Rencana Pelaksanaan</label>
                                            <input id="edit_rencana" name="rencana_pelaksanaan" type="date"
                                                class="form-control" id="" placeholder="Input Here">
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div style="margin-top: 30px;"></div>
                            <div class="row">
                                <div class="col-md-4" style="margin-top: 10px;">
                                    <fieldset>
                                        <div class="form-check form-switch">
                                            <input id="edit_swa" class="form-check-input" type="checkbox">
                                            <input name="swa_kelola" type="hidden" value="`+ data.swa_kelola +`"
                                                id="edit_swa2">
                                            <label class="form-check-label" for="">Swa
                                                Kelola</label>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-4" style="margin-top: 10px;">
                                    <fieldset>
                                        <div class="form-check form-switch">
                                            <input id="edit_kerja" class="form-check-input" type="checkbox">
                                            <input name="kerja_sama" type="hidden" value="`+ data.kerja_sama +`"
                                                id="edit_kerja2">
                                            <label class="form-check-label" for="">Kerjasama</label>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-4" style="margin-top: 10px;">
                                    <fieldset>
                                        <div class="form-check form-switch">
                                            <input id="edit_pihak" class="form-check-input" type="checkbox">
                                            <input name="pihak_ketiga" type="hidden" value="`+ data.pihak_ketiga +`"
                                                id="edit_ketiga2">
                                            <label class="form-check-label" for="">Pihak
                                                Ketiga</label>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>    
                        </div>    
                        <div class="col-md-1"></div>    
                    </div>    
                </body>
                
                `);
                $('#univModal').modal('show');
                $('#form-edit').attr('action',`{{route('rkp.update')}}`);
                $('#edit_bidang').val(data.id_bidang);
                $('#edit_sub').val(data.sub_bidang);
                $('#edit_jkegiatan').val(data.jenis_kegiatan);
                $('#edit_lokasi').val(data.id_lokasi);
                $('#edit_volume').val(data.perkiraan_volume);
                $('#edit_sasaran').val(data.sasaran);
                $('#edit_pelaksanaan').val(data.pelaksanaan);
                $('#edit_biaya').val(data.biaya);
                $('#edit_sumber').val(data.sumber);
                $('#edit_rencana').val(data.rencana_pelaksanaan);
                if ($('#edit_swa2').val() == 1) {
                    $('#edit_swa').prop('checked', true);
                }
                if ($('#edit_kerja2').val() == 1) {
                    $('#edit_kerja').prop('checked', true);
                }
                if ($('#edit_pihak2').val() == 1) {
                    $('#edit_pihak').prop('checked', true);
                }
                
                $('#edit_swa').change(function()
                {
                    if ($('#edit_swa').is(':checked')) {
                    $('#edit_swa2').val(1);
                    } else {
                        $('#edit_swa2').val(0);
                    }
                });

                $('#edit_kerja').change(function()
                {
                    if ($('#edit_kerja').is(':checked')) {
                    $('#edit_kerja2').val(1);
                    } else {
                        $('#edit_kerja2').val(0);
                    }
                });
                
                $('#edit_pihak').change(function()
                {
                    if ($('#edit_pihak').is(':checked')) {
                    $('#edit_ketiga2').val(1);
                    } else {
                        $('#edit_ketiga2').val(0);
                    }
                });
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