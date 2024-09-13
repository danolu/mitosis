<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="/assets/images/flags/{{$current_locale}}.svg" class="wd-20 me-1" title="{{$current_locale}}" alt="{{$current_locale}}"> <span class="ms-1 me-1 d-none d-md-inline-block">{{locale_get_display_name($current_locale)}}</span>
  </a>

  <div class="dropdown-menu" aria-labelledby="languageDropdown">
    @foreach($available_locales as $locale_name => $locale_shorthand)
      @if($locale_shorthand === $current_locale)
      @else
      <a href="#" wire:click.prevent="switchLang('{{$locale_shorthand}}')" class="dropdown-item py-2" wire:key="{{ $locale_name }}"> 
        <img src="/assets/images/flags/{{$locale_shorthand}}.svg" class="wd-20 me-1" title="{{$locale_shorthand}}" alt="{{$locale_shorthand}}"> 
        <span class="ms-1"> {{$locale_name}} </span>
      </a>
      @endif
    @endforeach
  </div>
</li>