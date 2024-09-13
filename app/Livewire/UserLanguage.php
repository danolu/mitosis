<?php

namespace App\Livewire;

use Livewire\Component;
use App; 
use Session;

class UserLanguage extends Component
{
    public $current_locale;

    public $available_locales;

    public function mount()
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
    }

    public function render()
    {
        return view('components.user.language');
    }

    public function switchLang($locale)
    {
        App::setLocale($locale);
        Session::put('locale', $locale);
        $this->current_locale = $locale;
        return $this->dispatch('languageChanged');
    }
}
