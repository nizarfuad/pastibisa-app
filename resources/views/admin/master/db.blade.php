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
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>User Database</h4>
                    </div>
                    <div class="card-body">
                        <a type="button" href="" class="btn btn-primary">go to</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Reservasi Database</h4>
                    </div>
                    <div class="card-body">
                        <a type="button" href="" class="btn btn-primary">go to</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Keuangan Database</h4>
                    </div>
                    <div class="card-body">
                        <a type="button" href="" class="btn btn-primary">go to</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Tipe Database</h4>
                    </div>
                    <div class="card-body">
                        <a type="button" href="" class="btn btn-primary">go to</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Satuan Database</h4>
                    </div>
                    <div class="card-body">
                        <a type="button" href="" class="btn btn-primary">go to</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Forum Database</h4>
                    </div>
                    <div class="card-body">
                        <a type="button" href="" class="btn btn-primary">go to</a>
                    </div>
                </div>
            </div>
        </div>

      </div>
    </section>
</div>
@endsection
