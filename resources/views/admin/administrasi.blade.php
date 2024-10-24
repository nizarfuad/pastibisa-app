@extends('admin.layouts.main')

@section('container')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">{{ $title }}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="card card-statistic-2">
                        <div class="card-icon bg-success">
                            <i class="fas fa-usd"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pemasukan</h4>
                            </div>
                            <div class="card-body">
                                <h6 id="fufuFafa"></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="card card-statistic-2">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-scissors"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pengeluaran</h4>
                            </div>
                            <div class="card-body">
                                <h6 id="fafaFufu"></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="card card-statistic-2">
                        <div class="card-icon bg-info">
                            <i class="fas fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Laporan Kas</h4>
                            </div>
                            <div class="card-body">
                                <h6 id="fafaFafa"></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Database Keuangan</h4>
                        <div class="card-header-action">
                            <div class="btn-group btn-group-sm">
                                <a href="" class="btn btn-sm btn-primary" id="modal-store-btn">create</a>
                                <a href="{{ url('/administrasi/export/excel') }}" class="btn btn-sm btn-primary">export</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @php
                            $i = 1;
                            $gain_tot = 0;
                            $loss_tot = 0;
                        @endphp
                        @if ($keuangan->count() == 0)
                            Belum ada data!
                        @else
                            <div class="table-responsive">
                                @include('admin.administrasi.table.administrasi-table', $data)
                            </div>
                        @endif
                        @foreach ($keuangan->where('tipe_id', 1) as $e)
                            @php($gain_tot += $e->harga * $e->jumlah)
                        @endforeach
                        @foreach ($keuangan->where('tipe_id', 2) as $e)
                            @php($loss_tot += $e->harga * $e->jumlah)
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>


    @include('modals.form-store')
    @include('modals.form-info')
    @include('modals.form-edit')








    <script src="{{ asset('stisla/node_modules/prismjs/prism.js') }}"></script>
    {{-- <script src="{{ asset('stisla/assets/js/page/bootstrap-modal.js') }}"></script> --}}
@endsection

@section('scripts')
    <script type="text/javascript">
        var a = "@currency($gain_tot)"
        var b = "@currency($loss_tot)"
        var c = "@currency($gain_tot - $loss_tot)"
        document.getElementById("fufuFafa").innerHTML = a;
        document.getElementById("fafaFufu").innerHTML = b;
        document.getElementById("fafaFafa").innerHTML = c;
    </script>


    {{-- @php($c = $keuangan->where('id', 1)->first()) --}}

    <script type="text/javascript">
        @foreach ($keuangan as $dbs)
            $('#modal-edit-btn-{{ $dbs->id }}').fireModal({
                title: 'Edit',
                body: $("#modal-edit-{{ $dbs->id }}"),

                buttons: [{
                    submit: true,
                    // class: 'custom-class',
                    // id: 'my-id',
                    text: 'Submit',
                    class: 'btn btn-primary',
                    handler: () => {

                    }
                }]
            });
        @endforeach
    </script>


    <script type="text/javascript"></script>


    <script type="text/javascript">
        @if (request()->session()->has('sukses'))

            swal('Berhasil', '{{ session()->get('sukses') }}', 'success');
        @endif


        @if (request()->session()->has('show_sukses'))

            $('#modal-info-btn').fireModal({
                title: 'Informasi',
                body: $("#modal-info"),

                buttons: [

                    {
                        submit: false,
                        id: 'modal-edit-btn-',
                        text: 'Edit',
                        class: 'btn btn-primary',
                        handler: (current_modal) => {
                            $.destroyModal(current_modal);
                        }
                    },

                    {
                        // submit: true,
                        // class: 'custom-class',
                        id: 'confirmation',
                        text: 'Hapus',
                        class: 'btn btn-danger',
                        handler: function(current_modal) {
                            $.destroyModal(current_modal);
                            swal({
                                title: 'Kamu Yakin?',
                                text: 'Aksi ini tidak dapat dikembalikan',
                                icon: 'warning',
                                buttons: {
                                    cancel: true,
                                    confirm: true,
                                },
                            }).then(function(isConfirm) {
                                if (isConfirm) {
                                    location.href =
                                        "/administrasi/delete/{{ session()->get('id') }}";
                                } else {
                                    // swal("Gagal", "File aman :)", "error");
                                }
                            });
                        }
                    },

                    {
                        // submit: true,
                        // class: 'custom-class',
                        // id: 'my-id',
                        text: 'Tutup',
                        class: 'btn btn-secondary',
                        handler: (current_modal) => {
                            $.destroyModal(current_modal);
                        }
                    },

                ]
            });

            $(document).ready(function() {
                // your code
                document.getElementById('modal-info-btn').click();
            });
        @endif
    </script>



    {{-- @error('keperluan')

<script type="text/javascript">

$(document).ready(function () {
// your code
    document.getElementById('modal-store-btn').click();
});

</script>


@enderror --}}

    @foreach ($errors->all() as $error)
        <script type="text/javascript">
            $(document).ready(function() {
                // your code
                document.getElementById('modal-store-btn').click();
            });
        </script>
    @endforeach

    <script type="text/javascript">
        $('#modal-store-btn').fireModal({
            title: 'Create new',
            body: $("#modal-store"),

            buttons: [{
                submit: true,
                // class: 'custom-class',
                // id: 'my-id',
                text: 'Submit',
                class: 'btn btn-primary',
                handler: () => {
                    $('#modal-store').submit;
                }
            }]
        });
    </script>

    <script type="text/javascript"></script>
@endsection
