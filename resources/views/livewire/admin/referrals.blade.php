<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title fw-semibold">Referral Earnings</h6>
        @if (count($earnings) <1)
          <p>There are no records of referral earnings yet.</p>
        @else
        <div class="table-responsive">
          <table id="dataTable" class="table table-hover">
            <thead>
              <tr>
                <th>SN</th>
                <th>Amount</th>
                <th>user</th>
                <th>Referee</th>
                <th>Investment</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach($earnings as $k=>$earning)
              <tr wire:key={{$earning->id}}>
                <td>{{++$k}}.</td>
                <td>{{$currency->symbol.number_format($earning->amount)}}</td>
                <td>{{$earning->user->first_name. ' ' .$earning->user->last_name}}</td>
                <td>{{$earning->investment->user->first_name. ' ' .$earning->investment->user->last_name}}</td>
                <td>{{$earning->investment->ref}}</td>
                <td>{{date("d-m-y", strtotime($earning->created_at))}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>