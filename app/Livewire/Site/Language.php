<?php

namespace App\Livewire\Site;

use Livewire\Component;
use App;
Use Session;

class Language extends Component
{
    public $current_locale;

    public $available_locales;

    public function render()
    {
        $this->current_locale = App::currentLocale();
        $this->available_locales = [
            'Chinese' => "zh",
            'English' => "en",
            'French' => "fr",
            'German' => "de",
            'Italian' => "it",
            'Japanese' => "jp",
            'Korean' => "ko",
            'Portugese' => "pt",
            'Russian' => "ru",
            'Spanish' => "es",
        ];
        return view('livewire.site.language');
    }

    public function switchLang($locale)
    {
        App::setLocale($locale);
        Session::put('locale', $locale);
        $this->current_locale = $locale;
        return $this->dispatch('languageChanged');
    }
}
