  <li class="top-links-item">
    <a href="#">{{locale_get_display_name($current_locale)}}
        <i class="sub-menu-indicator fa-solid fa-caret-down"></i>
    </a>
    <ul class="top-links-sub-menu">
    @foreach($available_locales as $locale_name => $locale_shorthand)
        @if($locale_shorthand === $current_locale)
        @else
        <li class="top-links-item">
            <a href="#" wire:click.prevent="switchLang('{{$locale_shorthand}}')" wire:key="{{ $locale_name }}">
                <img src="/assets/images/flags/{{$locale_shorthand}}.svg" title="{{$locale_shorthand}}" alt="{{$locale_shorthand}}"> 
                {{$locale_name}}
            </a>
        </li>
        @endif
    @endforeach
    </ul>
  </li>