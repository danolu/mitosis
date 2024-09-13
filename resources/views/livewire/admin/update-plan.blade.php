<div>
    <nav class="page-breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a wire:navigate href="{{route('admin.plans')}}">Plans</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Plan</li>
      </ol>
    </nav>
    <div class="row">
        <div class="col-12 grid-margin">
        <div class="profile-header card">
            <div class="card-body">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                <h4 class="mb-4 fw-semibold">Update Plan</h4>
                <form class="row" wire:submit="update">
                    <div class="col-12 mb-2">
                        <label for="plan_name">Plan Name</label>
                        <input type="text" class="form-control" wire:model="name" name="name" id="plan_name" placeholder="Enter a plan name">
                      </div>
                      <div class="col-12 mb-2">
                        <label for="email">Interest (%)</label>
                        <input type="number" class="form-control" wire:model="interest" id="interest" name="interest" placeholder="Enter ROI">
                      </div>
                      <div class="col-12 mb-2">
                        <label for="min_capital">Minimum Capital ({{$currency->symbol}})</label>
                        <input type="number" class="form-control" wire:model="min_capital" id="min_capital" name="min_capital" maxlength="14" placeholder="Enter minimum capital">
                      </div>
                      <div class="col-12 mb-2">
                        <label for="max_capital">Maximum Capital ({{$currency->symbol}})</label>
                        <input type="number" class="form-control" id="max_capital" wire:model="max_capital" name="max_capital" placeholder="Enter maximum capital">
                      </div>
                      <div class="col-12 mb-2">
                        <label for="duration">Duration</label>
                        <input type="number" class="form-control" name="duration" id="duration" wire:model="duration" placeholder="Enter plan duration">
                      </div>
                      <div class="col-12 mb-2">
                        <label for="period">Period</label>
                        <select class="form-control" name="period" id="period">
                          <option selected disabled>Select duration period</option>     
                          <option value="day" @if($plan->period==='day')selected @endif>Day</option>
                          <option value="week" @if($plan->period==='week')selected @endif>Week</option>
                          <option value="month" @if($plan->period==='month')selected @endif>Month</option>
                          <option value="year" @if($plan->period==='year')selected @endif>Year</option>
                        </select>
                      </div>
                      <div class="col-12 mb-2">
                        <label for="ref_percent">Referral Percentage (%)</label>
                        <input type="number" class="form-control" name="ref_percent" wire:model="ref_percent" id="ref_percent" placeholder="Enter referral percentage">
                      </div>
                      <div class="col-12 mb-2">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                          <option value="1" @if($plan->status===1)selected @endif>Enabled</option>
                          <option value="0" @if($plan->status===0)selected @endif>Disabled</option>
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