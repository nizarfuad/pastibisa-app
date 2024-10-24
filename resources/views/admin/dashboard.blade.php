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
                    <div class="col-lg-9 col-sm-12">
                        <div class="hero text-white hero-bg-image hero-bg-parallax"
                            data-background="{{ asset('stisla/assets/img/unsplash/andre-benz-1214056-unsplash.jpg') }}">
                            <div class="hero-inner">
                                <h4>Hai, {!! '@' . auth()->user()->username !!}</h4>
                                <p class="lead">Selamat datang, Dashboard manajemen PastiBisa ter integrasi.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
