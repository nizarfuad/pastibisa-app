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
                <div class="card-body" >
                    <h6 id="fafaFafa"></h6>
                </div>
                </div>
            </div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                <h4>Database Nota Digital</h4>
                <div class="card-header-action">
                    <div class="btn-group btn-group-sm">
                    <a href="" class="btn btn-sm btn-primary" id="modal-store-btn">create</a>
                    <a href="#" class="btn btn-sm btn-primary">export</a>
                    @if ($keuangan->count() == 0)

                    @else

                    <a href="{{ route('diginotes_markall') }}" class="btn btn-sm btn-warning">mark all</a>

                    @endif
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
                    <table class="table table-bordered table-md text-center" id="table-1">
                    <thead>
                        <tr>
                        <th class="text-center">
                            #
                        </th>
                        <th>Keperluan</th>
                        <th>Harga x jml</th>
                        <th>Total</th>
                        <th>Kategori</th>
                        <th>Dari</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($keuangan as $d)
                        <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $d->keperluan }}</td>
                        <td>{{ $d->format }}</td>
                        <td>@currency($d->multiply)</td>
                        <td><h6><div class="badge badge-{{ $d->tipes->color }}">{{ $d->tipes->tipe }}</div></h6></td>
                        <td><a href="/diginotes/{{ $d->user->username }}">{{ $d->user->name }}</a></td>
                        <td><a type="button" class="btn btn-sm btn-icon btn-info" href="/diginotes/{{ $d->user->username }}/{{ $d->id }}" ><i class="fas fa-list"></i></a></td>
                        </tr>
                        @endforeach
                        <button type="button" id="modal-info-btn" hidden>My Button</button>
                    </tbody>
                    </table>
                </div>
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
    </section>
</div>

    @include('modals.form-store')
    @include('modals.form-info')
    @include('modals.form-edit')

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
@endsection
