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
                  <h4>Database User</h4>
                  <div class="card-header-action">
                    <div class="btn-group btn-group-sm">
                      <button class="btn btn-sm btn-primary" id="modal-store-btn" >register new</button>
                      <a href="#" class="btn btn-sm btn-primary">download</a>
                      <a href="#" class="btn btn-sm btn-primary">export</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-md text-center" id="table-1">
                      <thead>
                        <tr>
                          <th class="text-center">
                            #
                          </th>
                          <th>Name</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php($i = 1)
                        @foreach ($users as $u)
                        <tr>
                          <td>{{ $i++ }}</td>
                          <td>{{ $u->name }}</td>
                          <td>{{ $u->username }}</td>
                          <td>{{ $u->email }}</td>
                          <td><a type="button" class="btn btn-sm btn-icon btn-info" href="/master/user" ><i class="fas fa-list"></i></a></td>
                        </tr>
                        @endforeach
                        <button type="button" id="modal-info-btn" hidden>My Button</button>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
        </div>
    </section>

    @include('admin.master.modals.form-store')

</div>
@endsection

@section('scripts')
<script type="text/javascript">

    $('#modal-store-btn').fireModal({
        title: 'Register new',
        body: $("#modal-store"),

        buttons: [{
                submit: true,
                // class: 'custom-class',
                // id: 'my-id',
                text: 'Register',
                class: 'btn btn-primary',
                handler: () => {
                $('#modal-store').submit;
                }
            }]
        });

@foreach ($errors->all() as $error)

        $(document).ready(function () {
            document.getElementById('modal-store-btn').click();
        });

@endforeach

</script>
@endsection
