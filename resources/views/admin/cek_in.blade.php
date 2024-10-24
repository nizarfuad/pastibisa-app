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
            @include('modals.form-cekin')
        </div>
    </section>
</div>

@endsection
