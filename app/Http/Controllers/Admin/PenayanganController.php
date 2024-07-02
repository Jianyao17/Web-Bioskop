<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Livewire\Component;

class PenayanganController extends Component
{
    public function mount()
    {
        
    }

    public function render()
    {
        return view('Admin.penayangan')
            ->layoutData(['page' => 'Penayangan']);
    }
}
