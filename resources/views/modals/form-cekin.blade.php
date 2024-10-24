<div class="card">

    @if (session()->has('gagal'))
        <div class="alert alert-warning" role="alert">
            {{ session()->get('gagal') }}
        </div>
    @endif

    @if (session()->has('tidak_terdaftar'))
        <div class="alert alert-danger" role="alert">
            {{ session()->get('tidak_terdaftar') }}
        </div>
    @endif

    @if (session()->has('sukses'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('sukses') }}
        </div>
    @endif

    <div class="card-header">Scanner</div>
    <div class="card-body text-center bg-attach">
        <video class="mw-100" id="preview"></video>

        <form action="{{ route('cek_in_store') }}" method="POST" id="form">
            @csrf
            <input type="hidden" name="uni_id" id="uni_id">
        </form>
    </div>
</div>

<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script type="text/javascript">
    let scanner = new Instascan.Scanner({
        video: document.getElementById('preview')
    });
    scanner.addListener('scan', function(content) {
        console.log(content);
    });
    Instascan.Camera.getCameras().then(function(cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error('No cameras found.');
        }
    }).catch(function(e) {
        console.error(e);
    });

    scanner.addListener('scan', function(c) {
        document.getElementById('uni_id').value = c;
        document.getElementById('form').submit();
    })
</script>
