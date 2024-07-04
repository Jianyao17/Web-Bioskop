<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Livewire\Component;

class HomeController extends Component
{
    public $films, $search;

    public function render()
    {
        $this->films = Film::where('judul_film', 'like', '%' . $this->search . '%')->get();

        return view('Public.home')
            ->layout('_Layouts.base', ['page' => 'Home']);
    }
}
