<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Review;
use Illuminate\Http\Request;

class Reviews extends Component
{
    public $title = 'Reviews';

    public $reviews;

    public function mount()
    {
        $this->reviews = Review::latest()->get();
    }

    public function render()
    {
        return view('livewire.admin.reviews')->layout('components.layouts.admin')->title($this->title);
    }

    public function store()
    {
        $validated = $this->validate([
            'name' => 'required|string',
            'occupation' => 'required|string',
            'review' => 'required|string',
        ]);
        $sav = Review::create($validated);
        if ($sav) {
            $this->reset('name', 'occupation', 'review');
            return $this->notify('success', 'Review added');
        } else {
            return $this->notify('error', 'Unable to add review');
        }
    }

    public function update(Review $review)
    {
        $validated = $this->validate([
            'name' => 'required|string',
            'occupation' => 'required|string',
            'review' => 'required|string',
        ]);
        $sav = $review->update($validated);
        if ($sav) {
            return $this->notify('success', 'Review updated');
        } else {
            return $this->notify('error', 'Review update failed');
        }
    }

    public function destroy(Review $review)
    {
        $sav =  $review->delete();
        if ($sav) {
            return $this->notify('success', 'Review deleted');
        } else {
            return $this->notify('error', 'Unable to delete review');
        }
    }
}
