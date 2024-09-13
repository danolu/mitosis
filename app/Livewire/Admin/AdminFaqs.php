<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Faq;

class AdminFaqs extends Component
{
    public $faqs;

    public $title = 'Frequently Asked Questions';

    public $question, $answer;

    public function mount()
    {
        $this->faqs = Faq::orderBy('id', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.admin.faqs')->layout('components.layouts.admin')->title($this->title);
    }

    public function store()
    {
        $validated = $this->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        $sav = Faq::create($validated);

        if ($sav) {
            $this->reset('question', 'answer');
            return $this->notify('success', 'Faq created');
        } else {
            return $this->notify('error', 'Faq creation failed');
        }
    }

    public function update(Faq $faq)
    {
        $validated = $this->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        $sav = $faq->update($validated);

        if ($sav) {
            return $this->notify('success', 'Faq updated');
        } else {
            return $this->notify('error', 'Faq update failed');
        }
    }

    public function destroy(Faq $faq)
    {
        $sav =  $faq->delete();
        
        if ($sav) {
            return $this->notify('success', 'Faq deleted');
        } else {
            return $this->notify('error', 'Unable to delete Faq');
        }
    }
}
