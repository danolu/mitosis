<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title fw-semibold">Send Email</h6>
        <form wire:submit="send" class="row">
          <div class="col-12 mb-2">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" id="subject" wire:model="subject" name="subject" placeholder="Subject" autofocus>
            @error('subject')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror                  
          </div>
          <div class="col-12 mb-2">
            <label for="subject">Recipient</label>
            <input type="email" class="form-control" id="email" wire:model="email" name="email" placeholder="Email" readonly>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror                  
          </div>
          <div class="col-12 mb-2">
            <label for="message">Body </label>
            <textarea class="form-control" wire:model="message" name="message" id="tinymceExample" rows="10"></textarea>
            @error('message')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror                  
          </div>
          <div class="col-12 d-grid">
          <button class="btn btn-primary" type="submit">Send Email</button>
        </form>
      </div>
    </div>
  </div>
</div>