<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Livewire\Component;

class HomeController extends Component
{
    public function render()
    {
        return view('Public.home')
            ->layout('_Layouts.base', ['page' => 'Home']);
    }
}
