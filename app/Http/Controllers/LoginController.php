<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('Public.login');
    }
    
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|string|min:4',
        ]);

        if (Auth::attempt($validatedData))
        {
            $request->session()->regenerate();
            $user_role = auth()->user()->role;
            $nama_bioskop = auth()->user()->BioskopName();

            switch (auth()->user()->role) 
            {
                case 'Member-Bioskop'   :  return redirect('/'); break;
                case 'Super-Admin'      :  return redirect('/semua-bioskop/penayangan'); break;
                case  $user_role        :  return redirect('/'.$nama_bioskop.'/penayangan'); break;
                default:
                    return back()->with('roleError', 'User Role Tidak Diketahui');
                    break;
            }
        }

        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
