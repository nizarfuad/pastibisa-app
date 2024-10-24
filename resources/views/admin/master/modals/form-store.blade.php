<form action="{{ route('master_register_user') }}" method="POST" class="modal-part" id="modal-store">
    @csrf
    <div class="form-group">
      <label>Nama</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fas fa-user"></i>
          </div>
        </div>
        <input type="text" class="form-control @error('name') {{ 'is-invalid' }} @enderror" placeholder="Sugiono Harahap" name="name">
        <div class="invalid-feedback">
            @error('name') {{ $message }} @enderror
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                  <label>Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-tag"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control @error('username') {{ 'is-invalid' }} @enderror" placeholder="Username" name="username">
                    <div class="invalid-feedback">
                        @error('username') {{ $message }} @enderror
                    </div>
                  </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label>Email</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-envelope"></i>
                    </div>
                  </div>
                  <input type="email" class="form-control @error('email') {{ 'is-invalid' }} @enderror" placeholder="blabla@pastibisa.com" name="email">
                  <div class="invalid-feedback">
                      @error('email') {{ $message }} @enderror
                  </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label>Password</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-key"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control @error('password') {{ 'is-invalid' }} @enderror" placeholder="Password" name="password">
                  <div class="invalid-feedback">
                      @error('password') {{ $message }} @enderror
                  </div>
                </div>
            </div>
        </div>
    </div>
</form>
