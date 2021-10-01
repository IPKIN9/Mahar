@extends('Base.TemplateDash')
@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Perubahan Data <code>RENCANA ANGGARAN BIAYA</code></h3>
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
                        <form action="{{route('rab.update')}}" method="POST">
                            @csrf
                            <div class="row" id="td-update">
                                <input type="hidden" value="{{$data['rab']->id}}" name="id_rab">
                                <input type="hidden" value="{{$data['rab']->id_rkp}}" id="id_rkp" name="id_rkp">
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
                                                    <input type="text" class="form-control" id="" readonly="readonly"
                                                        value="{{$data['rab']->bidang_role->nama_bidang}}">
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>Edit Sub Bidang</label>
                                                    <span><code>| Pastikan data telah dipilih</code></span>
                                                    <input type="text" class="form-control" id="" readonly="readonly"
                                                        value="{{$data['rab']->rkp_role->sub_bidang}}">
                                                    @error('sub_bidang')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div style="margin-top: 30px;"></div>
                                    <div class="row" id="form-detail">
                                        <div class="col-md-6">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label for="">Kegiatan</label>
                                                    <textarea readonly name="jenis_kegiatan" required
                                                        class="form-control"
                                                        rows="4">{{$data['rab']->rkp_role->jenis_kegiatan}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Waktu Pelaksanaan</label>
                                                    <input readonly required type="text" class="form-control"
                                                        value="{{$data['rab']->rkp_role->pelaksanaan}}"
                                                        placeholder="Input Here">
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label for="">Keluaran</label>
                                                    <textarea required name="nama_pengeluaran" class="form-control"
                                                        id="" rows="4">{{$data['rab']->nama_pengeluaran}}</textarea>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div style="margin-top: 30px;"></div>
                                    <hr>
                                    <div class="row">
                                        <div class="card-body">
                                            <table class="table table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Uraian</th>
                                                        <th>Detail Biaya</th>
                                                        <th>Ubah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $no = 1;
                                                    @endphp
                                                    @foreach ($data['detail'] as $d)
                                                    <tr>
                                                        <td>
                                                            {{$no++}}
                                                            <input type="hidden" name="id_detail[]" value="{{$d->id}}">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="uraian[]" required
                                                                id="strike-re{{$d->id}}" class="form-control"
                                                                value="{{$d->uraian}}">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="detail_biaya[]" required
                                                                id="detail_jumlah-re{{$d->id}}"
                                                                class="form-control count-detail"
                                                                value="{{$d->detail_jumlah}}">
                                                        </td>
                                                        <td>
                                                            <button type="button" id="re{{$d->id}}"
                                                                onclick="deleting(this.id)"
                                                                class="btn btn-sm icon btn-warning"><i
                                                                    class="fas fa-minus"></i></button>
                                                            <input type="hidden" value="false" name="del[]"
                                                                id="del-input-re{{$d->id}}">
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12" id="add-form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h5>Tambah Data</h5> <span><code id="alert-req"></code></span>
                                                </div>
                                                <div class="col-md-6" style="text-align: right">
                                                    <button type="button" id="enable-btn"
                                                        class="btn btn-primary">Enable</button></div>
                                            </div>
                                            <div class="row">
                                                <input type="hidden" name="id_detail[]">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-sm-1"></div>
                                                        <div class="col-sm-11">
                                                            Uraian
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">Detail Biaya</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <input type="hidden" id="count" value="0">
                                                        <div id="add-btn" class="col-sm-1">
                                                        </div>
                                                        <div class="col-sm-11">
                                                            <input disabled="true" type="text" name="uraian[]"
                                                                placeholder="Masukan Data"
                                                                class="form-control enable-input" id="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <input disabled="true" type="number" name="detail_biaya[]"
                                                        class="form-control count-detail enable-input" required
                                                        placeholder="Masukan Data" id="i-detail" value="0">
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 30px;"></div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 30px;">
                                        <div class="col-md-6" style="text-align: right">
                                            <button type="button" id="hitung" class="btn icon icon-left btn-secondary">
                                                Hitung Ulang</button>
                                        </div>
                                        <div class="col-md-6 text-right" style="margin-top: -20px;">
                                            <div class="row">
                                                <div class="col-sm-8">

                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label for="">Anggaran Yang Tersedia</label>
                                                            <input required name=""
                                                                value="{{$data['rab']->rkp_role->biaya}}" readonly
                                                                type="number" class="form-control" id="anggaran"
                                                                placeholder="Input Here">
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-4">
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label for="">Total Biaya</label>
                                                            <input required name="total_jumlah" type="number" readonly
                                                                class="form-control" id="jumlah"
                                                                placeholder="Input Here" value="0">
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 30px;">
                                        <div class="col-md-6" style="text-align: right">
                                            <button type="submit" class="btn icon icon-left btn-success"><i
                                                    class="fas fa-paper-plane"></i>
                                                Kirim</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-danger" id="btn-reset">Reset</button>
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
</section>
@endsection
@section('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $(document).on('click','#btn-reset',function()
    {
        location.reload();
    });

    $(document).on('click', '#enable-btn', function()
    {
        $('.enable-input').prop('disabled', false);
        $('#enable-btn').removeClass('btn-primary');
        $('#enable-btn').html('Disable');
        $('#i-detail').val('');
        $('#add-btn').html(`
        <button disabled type="button"
            class="btn icon btn-danger btn-sm enable-input">
            <i class="fas fa-plus"></i>
        </button>
        `);
    });

    function deleting(clicked) {
        // alert(clicked);
        $('#del-input-'+clicked).val(true);
        $('#detail_jumlah-'+clicked).val(0);
        $('#detail_jumlah-'+clicked).prop('disabled', true);
        $('#'+clicked).removeClass('btn-warning');
        $('#'+clicked).prop('disabled', true);
        $('#strike-'+clicked).prop('disabled', true);
    }

    $(document).on('click','#add-btn', function()
    {
        let count = $('#count').val();
        let countUp = parseInt(count) + 1;
        $('#count').val(countUp);
        $('#add-form').append(`
        <div class="row form`+countUp+`">
            <div class="col-md-6">
                <div class="row">
                    <div id="del-btn`+countUp+`" class="col-sm-1"><button type="button"
                            class="btn icon btn-warning btn-sm">
                            <i class="fas fa-minus"></i>
                        </button></div>
                    <div class="col-sm-11">
                        <input type="text" name="uraian_baru[]" placeholder="Masukan Data" class="form-control"
                            id="">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <input type="number" name="detail_biaya_baru[]" required placeholder="Masukan Data"
                class="form-control count-detail" id="i-detail">
            </div>
        </div>
        <div class="row form`+countUp+`" style="margin-top: 30px;"></div>
        `);
        $(document).on('click', `#del-btn`+countUp+``, function()
        {
            $('.form'+countUp).remove();
            let count2 = $('#count').val();
            let countDown = parseInt(count2) - 1;
            $('#count').val(countDown);
        });
    });

    $(document).on('click', '#hitung', function()
    {
        var result = $('#td-update input[type="number"]').filter(function () {
            return $.trim($(this).val()).length == 0
        }).length == 0;

        console.log(result);
        if( result == false ) {
            $('#alert-req').html("Perhatikan Form Yang Kosong");
            $('#i-detail').focus();
        } else {
            $('#td-update').each(function(){
                var totalPoints = 0;
                $(this).find('.count-detail').each(function(){
                    totalPoints += parseInt($(this).val());
                });
                $('#jumlah').val(totalPoints);
                $('#alert-req').html("");
            });
        }
    });
    
</script>
@endsection