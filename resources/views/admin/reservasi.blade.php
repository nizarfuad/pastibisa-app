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
                        <div class="card-icon bg-primary">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Reservasi Terdaftar</h4>
                            </div>
                            <div class="card-body">
                                {{ count($reservasi) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="card card-statistic-2">
                        <div class="card-icon bg-info">
                            <i class="fas fa-clipboard-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Menonton</h4>
                            </div>
                            <div class="card-body">
                                {{ count($attend) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Reservasi</h4>
                        <div class="card-header-action">
                            <div class="">
                                <button data-toggle="modal" data-target="#storeModal" class="btn btn-sm btn-primary"
                                    id="store-reservasi">register</button>
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>is Attend</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach ($reservasi as $s)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $s->name }}</td>
                                            <td>{{ $s->email }}</td>
                                            <td>{{ $s->phone }}</td>
                                            <td>
                                                @isset($s->cekin)
                                                    {!! '<div class="badge badge-success">' . $s->cekin->tanggal . '</div>' !!}
                                                    @endisset @empty($s->cekin)
                                                    {!! '<div class="badge badge-danger">No</div>' !!}
                                                @endempty
                                            </td>
                                            <td><button class="btn btn-sm btn-icon btn-info" id="btnShow"
                                                    data-toggle="modal" data-target="#showModal"
                                                    data-uuid="{{ $s->uni_id }}"><i class="fas fa-list"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="storeModal" tabindex="-1" role="dialog" aria-labelledby="storeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="storeModalLabel">Create Reservasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('create_reservasi') }}" method="POST" id="modal-store"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control @error('name') {{ 'is-invalid' }} @enderror"
                                    name="name">
                                <div class="invalid-feedback">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <input type="email" class="form-control @error('email') {{ 'is-invalid' }} @enderror"
                                    name="email">
                                <div class="invalid-feedback">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                </div>
                                <input type="phone" class="form-control @error('phone') {{ 'is-invalid' }} @enderror"
                                    name="phone">
                                <div class="invalid-feedback">
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="subReservasi" class="btn btn-primary" data-dismiss="modal">Submit</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showModalLabel">Create Reservasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text igt-muted">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" id="disName" disabled readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text igt-muted">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" id="disEmail" disabled readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Phone</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text igt-muted">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" id="disPhone" disabled readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Attend</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text igt-muted">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" id="disAttend" disabled readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="input-group justify-content-center">
                                        <div id="qrCodeImage"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="delReservasi" class="btn btn-danger" data-dismiss="modal">Delete</button>
                    <button id="downloadQr" type="button" class="btn btn-primary">Download QR</button>
                    <button id="sendEmail" type="button" class="btn btn-warning">Send Tiket</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        @if (request()->session()->has('sukses'))

            swal('Berhasil', '{{ session()->get('sukses') }}', 'success');
        @endif

        $("#subReservasi").click(function() {
            document.getElementById("modal-store").submit();
        });


        $(document).ready(function() {

            $("#showModal").modal({
                keyboard: true,
                backdrop: "static",
                show: false,

            }).on("show.bs.modal", function(event) {
                var button = $(event.relatedTarget);
                var uuid = button.data("uuid");

                $("#downloadQr").click(function() {
                    document.location.href = '/reservasi/download/qr/' + uuid;
                });

                $("#delReservasi").click(function() {

                    swal({
                        title: 'Yakin?',
                        text: "Aksi ini tidak dapat dipulihkan",
                        icon: 'warning',
                        buttons: {
                            confirm: {
                                text: "Hapus",
                                value: true,
                                visible: true,
                                className: "",
                                closeModal: true
                            },
                            cancel: true,

                        },
                    }).then(function(isConfirm) {
                        if (isConfirm) {
                            document.location.href = '/reservasi/delete/' + uuid;
                            swal({
                                title: 'Dihapus!',
                                text: 'QR Code berhasil di hapus',
                                icon: 'success',
                            });

                        }
                    })

                    //
                });

                $.ajax({
                    type: "GET",
                    url: "/show-reservasi/" + uuid,
                    success: function(response) {
                        $("#sendEmail").click(function() {
                            document.location.href = '/kirim-email/' + uuid
                        });
                        console.log(response);
                        $('#disName').val(response.reservar.name);
                        $('#disEmail').val(response.reservar.email);
                        $('#disPhone').val(response.reservar.phone);
                        if (response.cekin == null) {
                            $('#disAttend').val('No');

                        } else {
                            $('#disAttend').val(response.cekin.tanggal);
                        }
                        $('#qrCodeImage').html(response.qr);
                    }
                });
            }).on("hide.bs.modal", function(event) {
                $(this).find("#disName").val("");
                $(this).find("#disEmail").val("");
                $(this).find("#disPhone").val("");
                $(this).find("#disAttend").val("");
                $(this).find('#qrCodeImage').html("");

            });
        });
    </script>
@endsection
