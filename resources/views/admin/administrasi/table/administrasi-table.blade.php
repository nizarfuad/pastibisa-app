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
                {{-- <td>@currency($d->harga * $d->jumlah)</td> --}}
                <td>@currency($d->multiply)</td>
                <td>
                    <h6><span class="badge badge-{{ $d->tipes->color }}">{{ $d->tipes->tipe }}</span></h6>
                </td>
                <td><a href="/administrasi/{{ $d->user->username }}">{{ $d->user->name }}</a></td>
                <td><a type="button" class="btn btn-sm btn-icon btn-info"
                        href="/administrasi/{{ $d->user->username }}/{{ $d->id }}"><i class="fas fa-list"></i></a>
                </td>
            </tr>
        @endforeach
        <button type="button" id="modal-info-btn" hidden>My Button</button>
    </tbody>
</table>
