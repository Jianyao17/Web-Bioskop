<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Livewire\Component;

// Super Admin & Admin Bioskop
class LaporanController extends Component
{
    public function mount()
    {

    }
    
    public function render()
    {
        return view('Admin.laporan')
            ->layoutData(['page' => 'Laporan']);
    }
}
