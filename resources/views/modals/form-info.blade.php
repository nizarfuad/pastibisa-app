<form class="form modal-part" id="modal-info">
    <div class="form-group">
      <label>Keperluan</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text igt-muted">
            <i class="fas fa-box"></i>
          </div>
        </div>
        <input type="text" class="form-control" value="{{ session()->get('keperluan') }}" disabled readonly>
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
                  <input type="number" class="form-control" value="{{ session()->get('harga') }}" disabled readonly>
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
                  <input type="number" class="form-control" value="{{ session()->get('jumlah') }}" disabled readonly>
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
                      <option selected>{{ session()->get('tipe') }}</option>
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
                    <option selected>{{ session()->get('satuan') }}</option>
                  </select>
                </div>
              </div>
        </div>

      </div>

    <div class="form-group">
      <label>Bukti Foto</label>
      <div class="input-group">
        <img src="{{ asset(session()->get('attachment')) }}" class="mw-100" alt="">

    </div>
    </div>
</form>
