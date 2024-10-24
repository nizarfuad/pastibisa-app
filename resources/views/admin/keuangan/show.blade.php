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
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                @if ($title == 'Administrasi Lookup')
                    {!! '<h4>Rekam Administrasi dari </h4>'.$show->name !!}
                @elseif ($title == 'Digital Notes Lookup')
                    {!! '<h4>Rekam Diginotes dari </h4>'.$show->name !!}
                @endif
                </div>
                <div class="card-body">
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
                        </tr>
                    </thead>
                    <tbody>
                        @php($i = 1)
                        @if ($title == 'Administrasi Lookup')
                            @foreach ($show->keuangan->where('verify_id', 1) as $s)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $s->keperluan }}</td>
                                <td>{{ $s->format}}</td>
                                <td>@currency($s->multiply)</td>
                                <td><h6><div class="badge badge-{{ $s->tipes->color }}">{{ $s->tipes->tipe }}</div></h6></td>
                            </tr>
                            @endforeach

                        @elseif ($title == 'Digital Notes Lookup')

                            @foreach ($show->keuangan->where('verify_id', 0) as $s)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $s->keperluan }}</td>
                                <td>{{ $s->format}}</td>
                                <td>@currency($s->multiply)</td>
                                <td><h6><div class="badge badge-{{ $s->tipes->color }}">{{ $s->tipes->tipe }}</div></h6></td>
                            </tr>
                            @endforeach

                        @endif

                        <button type="button" id="modal-info-btn" hidden>My Button</button>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
