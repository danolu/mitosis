<div class="profile-page">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="profile-header card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 offset-md-3">
              <h4 class="mb-4 fw-semibold">Update Site Info</h4>
              <form wire:submit="update" class="row">
                <div class="col-12 mb-2">
                  <label for="name">Site Name</label>
                  <input type="text" class="form-control" wire:model="name" id="name" name="name">
                </div>
                <div class="col-12 mb-2">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" wire:model="email" id="email" name="email">
                </div>
                <div class="col-12 mb-2">
                  <label for="support_email">Support Email</label>
                  <input type="email" class="form-control" wire:model="support_email" id="support_email" name="support_email">
                </div>
                <div class="col-12 mb-2">
                  <label for="phone">Phone</label>
                  <input type="tel"  class="form-control" wire:model="phone" id="phone" name="phone">
                </div>
                <div class="col-12 mb-2">
                  <label for="alt_phone">Alternative Phone</label>
                  <input type="tel" class="form-control" wire:model="alt_phone" id="alt_phone" name="alt_phone">
                </div>
                <div class="col-12 mb-2">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" wire:model="address" id="address" name="address">
                </div>
                <div class="col-12 mb-2">
                  <label for="site_title">Site Title</label>
                  <input type="text" class="form-control" wire:model="site_title" id="site_title" name="site_title">
                </div>
                <div class="col-12 mb-2">
                  <label for="description">Site Description</label>
                  <input type="text" class="form-control" wire:model="description" id="description" name="description">
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