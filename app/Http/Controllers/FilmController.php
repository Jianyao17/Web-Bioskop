<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Livewire\Component;

class FilmController extends Component
{
    public $film;

    public function mount($nama_film)
    {
        $this->film = $nama_film;
    }

    public function render()
    {
        return view('Public.film')
            ->layout('_Layouts.base', ['page' => $this->film]);
    }
}
