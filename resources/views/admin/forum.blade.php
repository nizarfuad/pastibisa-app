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

            <div class="card">
                <div class="card-header">
                    <h4>Forum kecil kecilan</h4>
                    <div class="card-header-action">
                        <div class="btn">
                        <button href="" class="btn btn-primary" id="modal-forum-btn">post</button>
                        </div>
                    </div>
                </div>
            </div>

            @include('modals.form-forum-post')

            <script type="text/javascript">

                $('#modal-forum-btn').fireModal({
                    title: 'Post new forum',
                    body: $("#modal-forum"),

                    buttons: [{
                            submit: true,
                            // class: 'custom-class',
                            // id: 'my-id',
                            text: 'Post',
                            class: 'btn btn-primary',
                            handler: () => {
                            $('#modal-store').submit;
                            }
                        }]
                    });

            </script>

        <div class="row">
            <div class="col-12">
            @foreach ($forum as $f)
                <div class="activities">
                <div class="activity">
                    <div class="activity-icon bg-primary text-white shadow-primary">
                    <i class="fas fa-comment-alt"></i>
                    </div>
                    <div class="activity-detail">
                    <div class="mb-2">
                        <span class="text-job text-primary">2 min ago</span>
                        <span class="bullet"></span>
                        <a class="text-job" href="#">View</a>
                        <div class="float-right dropdown">
                        <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                        <div class="dropdown-menu">
                            <div class="dropdown-title">Options</div>
                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i> Detail</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item has-icon text-danger" data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?" data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Archive</a>
                        </div>
                        </div>
                    </div>
                    <p>{{ $f->value }}.</p>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        </div>
    </section>
</div>

@endsection
