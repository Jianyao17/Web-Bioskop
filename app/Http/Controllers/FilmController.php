<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Livewire\Component;

class FilmController extends Component
{
    public $film;

    public function mount($nama_film)
    {
        $this->film = Film::where('judul_film', $nama_film)->first();
    }

    public function render()
    {
        return view('Public.film')
            ->layout('_Layouts.base', ['page' => $this->film]);
    }
}
