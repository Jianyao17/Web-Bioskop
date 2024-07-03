<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Livewire\Component;

class HomeController extends Component
{
    public $films;

    public function render()
    {
        $this->films = Film::all();

        return view('Public.home')
            ->layout('_Layouts.base', ['page' => 'Home']);
    }
}
