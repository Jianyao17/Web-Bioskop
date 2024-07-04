<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {

        return view('Public.register');
    }

    public function register(Request $request)
    {
        $password = $request->password;
        
        $validatedData = $request->validate([
            'name'      => 'required|min:4|max:255',
            'email'     => 'required|email',
            'password'  => 'required|string|min:4',
            'password2' => 'required|string|min:4|in:'.$password,
        ]);

        $validatedData['role'] = 'Member-Bioskop';

        User::create([
            'name'      => $validatedData['name'],
            'email'     => $validatedData['email'],
            'password'  => Hash::make($validatedData['password']),
            'role'      => $validatedData['role']
        ]);

        $this->dispatch('notify', 
        [ 'type' => 'success', 'message' => 'Register User Berhasil']);

        return redirect('/login');
    }
}
