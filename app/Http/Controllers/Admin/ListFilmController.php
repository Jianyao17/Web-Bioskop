<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Livewire\Component;

// Super Admin & Admin Bioskop
class ListFilmController extends Component
{
    public $poster_film,$judul_film,$durasi,$deskripsi,$status;
    public $films,$film_id;

    public function mount()
    {
        
    }

    public function render()
    {
        return view('Admin.list-film')
            ->layoutData(['page' => 'Film']);
    }

    public function store(){
        $this->validate([
            'poster_film'      => 'required|string',
            'judul_film'     => 'required|string',
            'durasi'  => 'required|string|integer',
            'deskripsi'      => 'required|string',
            'status'    =>  'required|string'
        ]);


        Film ::create([
            'poster_film'  => $this->poster_film,
            'judul_film'  => $this->judul_film,
            'durasi'  => $this->durasi,
            'deskripsi'   => $this->role,
            'status' => $this->status
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
        $this->film_id = $id;
        $this->poster_film = $film->poster_film; 
        $this->judul_film = $film->judul_film;
        $this->durasi = $film->durasi;
        $this->deskripsi = $film->deskripsi;
        $this->status = $film->status;

    }

    public function update() 
    {
        // Validate data to be updated
        $this->validate([ 
            'poster_film'      => 'required|string',
            'judul_film'     => 'required|string',
            'durasi'  => 'required|string|integer',
            'deskripsi'      => 'required|string',
            'status'    =>  'required|string'
        ]);
        
        // Update data in database
        Film::find($this->film_id)->update(
        [
            'poster_film'  => $this->poster_film,
            'judul_film'  => $this->judul_film,
            'durasi'  => $this->durasi,
            'deskripsi'   => $this->role,
            'status' => $this->status
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

        $this->film_id = $id;
        $this->poster_film = $film->poster_film; 
        $this->judul_film = $film->judul_film;
        $this->durasi = $film->durasi;
        $this->deskripsi = $film->deskripsi;
        $this->status = $film->status;
    }

    public function delete()
    {
        Film::find($this->film_id)->delete();

        $this->resetValue();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('notify', 
        [ 'type' => 'success', 'message' => 'Film Berhasil Dihapus']);
    }

    public function resetValue()
    {
        $this->poster_film = '';
        $this->judul_film = '';
        $this->durasi = '';
        $this->deskripsi = '';
        $this->status = '';
    }
}
