<form action="{{ route('forum_store') }}" method="POST" class="modal-part" id="modal-forum">
    @csrf
    <div class="form-group">
      <label>Text</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fas fa-box"></i>
          </div>
        </div>
        <input type="text" class="form-control @error('value') {{ 'is-invalid' }} @enderror" name="value">
        <div class="invalid-feedback">
            @error('value') {{ $message }} @enderror
        </div>
      </div>
    </div>
</form>
