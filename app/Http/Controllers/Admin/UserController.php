<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Livewire\Component;

// Super Admin
class UserController extends Component
{
    public function render ()
    {
        return view('Admin.users')
            ->layoutData(['page' => 'Users']);
    }
}
