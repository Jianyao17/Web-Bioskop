<?php

namespace App\Http\Controllers\Admin;

use App\Models\Film;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

// Super Admin & Admin Bioskop
class ListFilmController extends Component
{
    use WithFileUploads;
    
    public $poster, $judul, $durasi, $deskripsi, $status;
    public $films, $film_id, $search = '';


    public function render()
    {
        $this->films = Film::where('judul_film', 'like', '%'.$this->search.'%')
                         ->orderBy('updated_at')->get();

        return view('Admin.list-film')
            ->extends('_Layouts.base-admin', ['page' => 'Film']);
    }

    public function store()
    {
        if (!Auth::user()->isSuperAdmin()) return;

        $this->validate([
            'poster'        => 'nullable|sometimes|file|image',
            'judul'         => 'required|string',
            'durasi'        => 'required|numeric',
            'deskripsi'     => 'required|string',
        ]);

        Film::create([
            'poster_film'   => $this->poster->store('img'),
            'judul_film'    => $this->judul,
            'durasi_menit'  => $this->durasi,
            'deskripsi'     => $this->deskripsi,
            'status'        => 'Coming Soon',
        ]);

        $this->resetValue();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('notify', 
        [ 'type' => 'success', 'message' => 'Film Berhasil Ditambahkan']);

    }

    public function editFilm($id) 
    {
        $film = Film::find($id);

        if (!$film) 
        {
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('notify', 
            [ 'type' => 'failed', 'message' => 'Film Tidak Ditemukan']);  
            return;
        }
        $this->film_id      = $id;
        $this->judul        = $film->judul_film;
        $this->durasi       = $film->durasi_menit;
        $this->deskripsi    = $film->deskripsi;
        $this->status       = $film->status;

    }

    public function update() 
    {
        if (!Auth::user()->isSuperAdmin()) return;
        
        // Validate data to be updated
        $this->validate([ 
            'poster'        => 'nullable|sometimes|file|image',
            'judul'         => 'required|string',
            'durasi'        => 'required|numeric',
            'deskripsi'     => 'required|string',
        ]);

        $img_path = Film::where('id', $this->film_id)->first()->poster_film;

        if ($this->poster)
        {
            Storage::delete($img_path);
            $img_path = $this->poster->store('img');
        }
        
        // Update data in database
        Film::find($this->film_id)->update(
        [
            'poster_film'   => $img_path,
            'judul_film'    => $this->judul,
            'durasi_menit'  => $this->durasi,
            'deskripsi'     => $this->deskripsi,
        ]);

        $this->resetValue();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('notify', 
        [ 'type' => 'success', 'message' => 'Film Berhasil Diperbarui']);
    }

    public function deleteFilm($id)
    {
        $film = Film::find($id);

        if (!$film) 
        {
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('notify', 
            [ 'type' => 'failed', 'message' => 'Film Tidak Ditemukan']);  
            return;
        }

        $this->film_id      = $id;
        $this->poster       = $film->poster_film; 
        $this->judul        = $film->judul_film;
        $this->durasi       = $film->durasi_menit;
        $this->deskripsi    = $film->deskripsi;
        $this->status       = $film->status;
    }

    public function delete()
    {
        if (!Auth::user()->isSuperAdmin()) return;

        Film::find($this->film_id)->delete();
        Storage::delete($this->poster);

        $this->resetValue();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('notify', 
        [ 'type' => 'success', 'message' => 'Film Berhasil Dihapus']);
    }

    public function resetValue()
    {
        $this->judul = '';
        $this->durasi = '';
        $this->deskripsi = '';
        $this->status = '';
    }
}
