<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Livewire\Component;

// Super Admin & Admin Bioskop
class BioskopController extends Component
{
    public function mount()
    {
        
    }

    public function render()
    {
        return view('Admin.bioskop')
            ->layoutData(['page' => 'Teater']);
    }
}
