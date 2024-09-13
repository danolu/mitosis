<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title fw-semibold">FAQs</h6>
          @if (!count($faqs))
          <p>There are no FAQs on platform.</p>    
          @else
          <div class="table-responsive">
            <table id="dataTable" class="table table-hover">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Question</th>
                  <th>Answer</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($faqs as $k=>$faq)
                <tr wire:key="{{$faq->id}}">
                  <td>{{++$k}}.</td>
                  <td>{{$faq->question}}</td>
                  <td>{{$faq->answer}}</td>
                  <td></td>
                  <td class="text-center">
                    <div class="dropdown mb-2">
                    <button class="btn p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-vertical"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#delete{{$faq->id}}"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                    </div>
                    </div>
                  </td>
                </tr>
                <div class="modal fade" id="delete{{$faq->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-body">
                        <h6>Are you sure you want to delete this FAQ?</h6>
                      </div>  
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a wire:click.prevent="destroy({{$faq->id}})" href="#" class="btn btn-danger">Yes</a>
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