<div class="profile-page">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="profile-header card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 offset-md-3">
                <h4 class="mb-4 fw-semibold">Update Site About</h4>
                <form wire:submit="update" class="row">
                  <div class="col-12 mb-2">
                    <label for="name">About Site</label>
                    <input type="text" class="form-control" wire:model="about" id="about" name="about">
                  </div>
                  <div class="col-12 d-grid">
                    <button type="submit" class="btn btn-outline-primary" wire:loading.attr="disabled">
                      <span wire:loading.remove>Update</span>
                      <span wire:loading class="spinner-border spinner-border-sm mx-2 text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                      </span>
                    </button>
                  </div>
                </form>
              </div>
            </div>            
          </div>
        </div>
      </div>
    </div> 
  </div>