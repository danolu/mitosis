<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <h4 class="text-start mb-3 mt-4 fw-semibold">Investment Plans</h4>
        <div class="mb-4">
          <h3 class="text-end">
            <a href="{{route('create.plan')}}" wire:navigate class="btn btn-primary me-2">Create New Plan</a>
          </h3>  
        </div>
        <div class="container">  
          <div class="row">
            @foreach($plans as $plan)
            <div class="col-md-4 mb-4 stretch-card">
              <div class="card text-center">
                <div class="card-body"> 
                  <h5 class="text-uppercase fw-semibold mt-3 mb-4">{{$plan->name}}</h5>
                  <h3 class="mb-2">{{$plan->interest}}% Interest</h3>
                  @if($plan->duration>1)
                  <h6 class="text-secondary mb-2 ">Duration: {{$plan->duration.' '.$plan->period}}s</h6>
                  @else
                  <h6 class="text-secondary mb-2 ">Duration: {{$plan->duration.' '.$plan->period}}</h6>
                  @endif
                  <h6 class="text-secondary mb-2 ">Minimum Capital: {{$currency->symbol.number_format($plan->min_capital)}}</h6>
                  <h6 class="text-secondary mb-4 ">Maximum Capital: {{$currency->symbol.number_format($plan->max_capital)}}</h6>
                  @if($plan->status==1)
                  <h6 class="text-secondary mb-4 "><span class="badge bg-success">Enabled</span></h6>
                  @else
                  <h6 class="text-secondary mb-4 "><span class="badge bg-danger">Disabled</span></h6>
                  @endif
                  <a class="btn btn-outline-primary d-block mx-auto mt-4" wire:navigate href="{{route('update.plan', $plan->id)}}">EDIT</a>
                </div>
              </div>
            </div>
            <div class="modal fade" id="deletePlan{{$plan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title fw-semibold" id="exampleModalLabel">{{$plan->name}} Plan Deletion</h5>
                    <button type="button-close" class="btn-close" data-dismiss="modal" aria-label="Close">
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to delete {{$plan->name}} Plan?</p>
                  </div>
                  <div class="modal-footer col-12 d-grid">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                    <button type="submit" class="btn btn-danger" wire:click.prevent="destroy({{$plan->id}})">DELETE</button>                    
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>