<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Completed Investments</h6>
        @if (!$investments)
        <p>There are no complete investments at the moment.</p>
        @else
        <div class="table-responsive">
          <table id="" class="table table-hover">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Investor</th>
                <th>Plan</th>
                <th>Capital</th>
                <th>Interest</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($investments as $k=>$investment)
              <tr wire:key={{$investment->id}}>
                <td>{{++$k}}.</td>
                <td>{{$investment->user->first_name.' '.$investment->user->last_name}}</td>
                <td>{{$investment->plan->name}}</td>
                <td>{{$currency->symbol.number_format($investment->capital)}}</td>
                <td>{{$currency->symbol.number_format($investment->interest)}}</td>
                <td>{{date("d/m/y", strtotime($investment->start_date))}}</td>
                <td>{{date("d/m/y", strtotime($investment->end_date))}}</td>
                <td class="text-center">
                  <div class="dropdown mb-2">
                  <button class="btn p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-lg text-muted pb-3px" data-feather="more-vertical"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#delete{{$investment->id}}"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                  </div>
                  </div>
                </td>
              </tr>
              <div class="modal fade" id="delete{{$investment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                      <h6>Are you sure you want to delete this investment?</h6>
                    </div>  
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <a wire:click.prevent="destroy({{$investment->id}})" href="#" class="btn btn-danger">Yes</a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </tbody>
          </table>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>