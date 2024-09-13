<div>
<section id="content">
<div class="content-wrap pb-0">
  <div class="clear"></div>
  <div class="section mt-0 mb-3">
    <div class="container">
    <div class="row align-items-center">
      <div class="col-md-8 offset-md-2">
        <div class="card shadow-sm">
          <div class="card-body">
            <h4 class="mb-3">{{__('Verify Your Email Address')}}</h4>
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif
             <p>{{__('You need to verify your email before you can proceed. A verification link has been sent to your email.')}} {{__('If you did not receive the email')}}, <a href="#" wire:click.prevent="resend" wire:loading.attr="disabled">{{__('click here to request another.')}}
            </a></p>
            <div class="text-center">
              <span wire:loading class="spinner-border spinner-border-lg mx-2 text-dard" role="status">
                <span class="sr-only">{{__('Loading...')}}</span>
              </span>
            </div>
             
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
</section>

</div>
