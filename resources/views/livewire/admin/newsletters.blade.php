<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title fw-semibold">Newsletter</h6>
        <form class="row" wire:submit="send">
          <div class="col-12 mb-2">
            <label for="subject">Subject*</label>
            <input type="text" class="form-control" id="subject" name="subject" wire:model="subject" placeholder="Subject" autofocus>
            @error('subject')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror                  
          </div>
          <div class="col-12 mb-2">
            <label for="message">Body (All newsletters are automatically prefixed with 'Dear |First Name|')*</label>
            <textarea class="form-control" name="message" id="tinymceExample" wire:model="message" rows="10"></textarea>
            @error('message')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror                  
          </div>
          <div class="d-grid col-12">
          <button class="btn btn-primary" type="submit">Dispatch Newsletter</button>
        </form>
      </div>
    </div>
  </div>
</div>