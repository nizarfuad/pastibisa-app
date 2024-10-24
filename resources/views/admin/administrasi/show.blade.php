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
                <h4>Lookup "{{ $show->keperluan }}" milik "{{ $show->user->username }}"</h4>
                <div class="card-header-action">
                    <div class="btn-group btn-group-sm">
                      <a href="@if ($title == 'Administrasi') {{ url('administrasi-delete/'.$show->id) }} @elseif ($title == 'Digital Notes') {{ url('diginotes-delete/'.$show->id) }} @elseif ($title == 'My Digital Notes') {{ url('mydiginotes-delete/'.$show->id) }} @endif" class="btn btn-sm btn-danger @if ($title == 'My Digital Notes') @if ($show->verify_id == 0) @else disabled @endif @endif">delete</a>
                      <a href="#" class="btn btn-sm btn-warning">edit</a>
                      @if ($title == 'Digital Notes')
                        <a href="{{ url('diginotes-mark/'.$show->id) }}" class="btn btn-sm btn-primary">mark</a>
                      @elseif ($title == 'Administrasi')
                        <a href="{{ url('administrasi-unmark/'.$show->id) }}" class="btn btn-sm btn-warning">unmark</a>
                      @endif
                    </div>
                  </div>
              </div>
              <div class="card-body">
                  <form class="form">
                      <div class="form-group">
                        <label>Keperluan</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text igt-muted">
                              <i class="fas fa-box"></i>
                            </div>
                          </div>
                          <input type="text" class="form-control" value="{{ $show->keperluan }}" disabled readonly>
                        </div>
                      </div>

                        <div class="row">
                          <div class="col-7">
                              <div class="form-group">
                                  <label>Harga</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text igt-muted">
                                        <i class="fas fa-tag"></i>
                                      </div>
                                    </div>
                                    <input type="text" class="form-control" value="@currency($show->harga)" disabled readonly>
                                  </div>
                                </div>
                          </div>

                          <div class="col-5">
                              <div class="form-group">
                                  <label>Jumlah</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text igt-muted">
                                        <i class="fas fa-hashtag"></i>
                                      </div>
                                    </div>
                                    <input type="number" class="form-control" value="{{ $show->jumlah}}" disabled readonly>
                                  </div>
                                </div>
                          </div>

                          <div class="col-7">
                              <div class="form-group">
                                  <label>Kategori</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text igt-muted">
                                        <i class="fas fa-list"></i>
                                      </div>
                                    </div>
                                    <select class="form-control" disabled readonly>
                                        <option selected>{{ $show->tipes->tipe}}</option>
                                    </select>
                                  </div>
                                </div>
                          </div>

                          <div class="col-5">
                              <div class="form-group">
                                  <label>Satuan</label>
                                  <div class="input-group ">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text igt-muted">
                                        <i class="fas fa-hammer"></i>
                                      </div>
                                    </div>
                                    <select class="form-control" disabled readonly>
                                      <option selected>{{ $show->satuans->satuan}}</option>
                                    </select>
                                  </div>
                                </div>
                          </div>

                        </div>

                      <div class="form-group">
                        <label>Bukti Foto</label>
                        <div class="input-group">
                          <img src="{{ asset($show->attachment)}}" class="mw-100" alt="">

                      </div>
                      </div>
                  </form>

              </div>
            </div>


          </div>
    </section>
</div>
@endsection
