@foreach ($keuangan as $k)

<form action="/administrasi/{{ $k->id }}/edit/" method="POST" class="modal-part" id="modal-edit-{{ $k->id }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label>Keperluan</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fas fa-box"></i>
          </div>
        </div>
        <input type="text" class="form-control @error('keperluan') {{ 'is-invalid' }} @enderror" placeholder="cth: Kopi" name="keperluan" value="{{ old('keperluan', $k->keperluan) }}">
        <div class="invalid-feedback">
            @error('keperluan') {{ $message }} @enderror
        </div>
      </div>
    </div>
    <div class="row">
          <div class="col-7">
              <div class="form-group">
                  <label>Harga</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-tag"></i>
                      </div>
                    </div>
                    <input type="number" class="form-control @error('harga') {{ 'is-invalid' }} @enderror" placeholder="cth: 30000" name="harga" value="{{ old('harga', $k->harga) }}">
                    <div class="invalid-feedback">
                        @error('harga') {{ $message }} @enderror
                    </div>
                    <input type="hidden" name="user_id" value="{{ $k->id }}" required>
                  </div>
              </div>
          </div>
          <div class="col-5">
            <div class="form-group">
                <label>Jumlah</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-hashtag"></i>
                    </div>
                  </div>
                  <input type="number" class="form-control @error('jumlah') {{ 'is-invalid' }} @enderror" placeholder="cth: 3" name="jumlah" value="{{ old('jumlah', $k->jumlah) }}">
                  <div class="invalid-feedback">
                      @error('jumlah') {{ $message }} @enderror
                  </div>
                </div>
              </div>
        </div>
          <div class="col-7">
            <div class="form-group">
                <label>Kategori</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-list"></i>
                    </div>
                  </div>
                  <select class="form-control @error('tipe_id') {{ 'is-invalid' }} @enderror" name="tipe_id" >
                      @foreach ($tipe as $tip)
                          <option value="{{ $tip->tipe_id }}">{{ $tip->tipe }}</option>
                      @endforeach
                  </select>
                  <div class="invalid-feedback">
                      @error('tipe_id') {{ $message }} @enderror
                  </div>
                </div>
              </div>
          </div>

        <div class="col-5">
            <div class="form-group">
                <label>Satuan</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-hammer"></i>
                    </div>
                  </div>
                  <select class="form-control @error('satuan_id') {{ 'is-invalid' }} @enderror" name="satuan_id">
                    @foreach ($satuan as $sat)
                    <option value="{{ $sat->satuan_id }}" >{{ $sat->satuan }}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">
                    @error('satuan_id') {{ $message }} @enderror
                </div>
                </div>
              </div>
        </div>
      </div>


    <div class="form-group">
      <label>Bukti Foto</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fas fa-image"></i>
          </div>
        </div>
        <input type="file" class="form-control @error('attachment') {{ 'is-invalid' }} @enderror" name="attachment">
        <div class="invalid-feedback">
            @error('attachment') {{ $message }} @enderror
        </div>
    </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endforeach
