<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="fw-semibold">{{__('Activity Log')}}</h4>
        <div class="table-responsive">
          <table id="dataTableExample" class="table table-hover">
            <thead>
              <tr>
                <th>{{__('Activity')}}</th>
                <th>{{__('Time')}}</th>
              </tr>
            </thead>
            <tbody>
              @foreach($activities as $activity)
              <tr wire:key="{{ $activity->id }}">
                <td>{{__($activity->activity)}}</td>
                <td>{{date("d-m-y H:i", strtotime($activity->created_at))}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $activities->links() }}
        </div>
      </div>
    </div>
  </div>
</div>