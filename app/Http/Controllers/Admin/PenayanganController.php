<?php

namespace App\Http\Controllers\Admin;

use App\Models\Penayangan;
use Illuminate\Http\Request;
use Livewire\Component;

class PenayanganController extends Component
{
    public $waktu_tayang, $id_film, $id_bioskop, $id_teater, $harga_tiket, $status;
    public $penayangan,$penayangan_id;

    public function mount()
    {
        
    }

    public function render()
    {
        return view('Admin.penayangan')
            ->extends('_Layouts.base-admin', ['page' => 'Penayangan']);
    }

    public function store()
    {
        $this->validate([
            'waktu_tayang'  => 'required|string',
            'id_film'       => 'required|string',
            'id_bioskop'    => 'required|string|integer',
            'id_teater'     => 'required|string',
            'harga_tiket'   => 'required|string',
            'status'        => 'required|string'
        ]);


        Penayangan ::create([
            'waktu_tayang'  => $this->waktu_tayang,
            'id_film'  => $this->id_film,
            'id_bioskop'  => $this->id_bioskop,
            'id_teater'   => $this->id_teater,
            'harga_tiket' => $this->harga_tiket,
            'status' => $this->status
        ]);

        $this->resetValue();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('notify', 
        [ 'type' => 'success', 'message' => 'Penayangan Berhasil Ditambahkan']);

    }

    public function editPenayangan($id) 
    {
        $penayangan = Penayangan::find($id);

        if (!$penayangan) 
        {
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('notify', 
            [ 'type' => 'failed', 'message' => 'Penayangan Tidak Ditemukan']);  
            return;
        }
        $this->penayangan_id = $id;
        $this->waktu_tayang = $penayangan->waktu_tayang; 
        $this->id_film = $penayangan->id_film;
        $this->id_bioskop = $penayangan->id_bioskop;
        $this->id_teater = $penayangan->id_teater;
        $this->harga_tiket = $penayangan->harga_tiket;
        $this->status = $penayangan->status;

    }

    public function update() 
    {
        // Validate data to be updated
        $this->validate([ 
            'waktu_tayang'      => 'required|string',
            'id_film'     => 'required|string',
            'id_bioskop'  => 'required|string|integer',
            'id_teater'      => 'required|string',
            'harga_tiket'    =>  'required|string',
            'status'        => 'required|string'
        ]);
        
        // Update data in database
        Penayangan::find($this->penayangan_id)->update(
        [
            'waktu_tayang'  => $this->waktu_tayang,
            'id_film'  => $this->id_film,
            'id_bioskop'  => $this->id_bioskop,
            'id_teater'   => $this->id_teater,
            'harga_tiket' => $this->harga_tiket,
            'status' => $this->status
        ]);

        $this->resetValue();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('notify', 
        [ 'type' => 'success', 'message' => 'Penayangan Berhasil Diperbarui']);
    }

    public function deletePenayangan($id)
    {
        $penayangan = Penayangan::find($id);

        if (!$penayangan) 
        {
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('notify', 
            [ 'type' => 'failed', 'message' => 'Penayangan Tidak Ditemukan']);  
            return;
        }

        $this->penayangan_id = $id;
        $this->waktu_tayang = $penayangan->waktu_tayang; 
        $this->id_film = $penayangan->id_film;
        $this->id_bioskop = $penayangan->id_bioskop;
        $this->id_teater = $penayangan->id_teater;
        $this->harga_tiket = $penayangan->harga_tiket;
        $this->status = $penayangan->status;

    }

    public function delete()
    {
        Penayangan::find($this->penayangan_id)->delete();

        $this->resetValue();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('notify', 
        [ 'type' => 'success', 'message' => 'Penayangan Berhasil Dihapus']);
    }

    public function resetValue()
    {
         $this->waktu_tayang = ''; 
        $this->id_film = '';
        $this->id_bioskop = '';
        $this->id_teater = '';
        $this->harga_tiket = '';
        $this->status = '';
    }
}
