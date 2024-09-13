<div>
    <nav class="page-breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a wire:navigate href="{{route('admin.plans')}}">Plans</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create</li>
      </ol>
    </nav>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="profile-header card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <h4 class="mb-4 fw-semibold">Create Investment Plan</h4>
                        <form class="row" wire:submit="store">
                                <div class="col-12 mb-2">
                                    <label for="name">Plan Name</label>
                                    <input type="text" class="form-control" wire:model="name" name="name" id="name" placeholder="Enter a plan name">
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="interest">Interest (%)</label>
                                    <input type="number" class="form-control" wire:model="interest" name="interest" id="interest" placeholder="Enter interest rate">
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="min_capital">Minimum Capital</label>
                                    <input type="number" class="form-control" wire:model="min_capital" name="min_capital" id="min_capital" maxlength="14" placeholder="Enter minimum capital">
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="max_capital">Maximum Capital</label>
                                    <input type="number" class="form-control" wire:model="max_capital" name="max_capital" id="max_capital" placeholder="Enter maximum capital">
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="duration">Duration</label>
                                    <input type="number" class="form-control" wire:model="duration" name="duration" id="duration" placeholder="Enter plan duration">
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="period">Period</label>
                                    <select class="form-control" wire:model="period" name="period" id="period">
                                    <option selected disabled>Select duration period</option>
                                    <option value="day">Day</option>
                                    <option value="week">Week</option>
                                    <option value="month">Month</option>
                                    <option value="year">Year</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="ref_percent">Referral Percentage (%)</label>
                                    <input type="number" wire:model="ref_percent" name="ref_percent" class="form-control" id="ref_percent" placeholder="Enter referral percentage">
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="status">Enabled</label>
                                    <select class="form-control" wire:model="status" name="status" id="status">
                                    <option value="1" selected>Yes</option>
                                    <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="col-12 d-grid">
                                    <button type="submit" class="btn btn-outline-primary" wire:loading.attr="disabled">
                                        <span wire:loading.remove>Create Plan</span>
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