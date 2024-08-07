<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bioskop;
use App\Models\Teater;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

// Super Admin & Admin Bioskop
class BioskopController extends Component
{
    public $nama_bioskop, $lokasi_bioskop, $bioskop_id;
    public $nama_teater, $id_bioskop, $list_kursi, $kapasitas, $teater_id;
    public $list_data, $search;
    

    public function render()
    {
        if (Auth::user()->isSuperAdmin())
        {
            $this->list_data = Bioskop::orderBy('nama_bioskop')
            ->where('nama_bioskop', 'like', '%'.$this->search.'%')->get();
        } 
        else if (Auth::user()->isAdminBioskop())
        {
            $this->list_data = Teater::where('nama_teater', 'like', '%'.$this->search.'%')->get();
        }

        return view('Admin.bioskop')
            ->extends('_Layouts.base-admin', ['page' => 'Bioskop']);
    }

    public function storeBioskop()
    {
        if (!Auth::user()->isSuperAdmin()) return;
        
        $this->validate([
            'nama_bioskop'  => 'required|unique:gedung_bioskop,nama_bioskop',
            'lokasi_bioskop'=> 'required|string',
        ]);

        Bioskop::create([
            'nama_bioskop'  => $this->nama_bioskop,
            'lokasi_bioskop'=> $this->lokasi_bioskop,
        ]);

        $this->resetValue1();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('notify', 
        [ 'type' => 'success', 'message' => 'Bioskop Berhasil Ditambahkan']);

    }

    public function storeTeater()
    {
        $this->validate([
            'nama_teater'   => 'required|string|min:4',
            'bioskop_id '   => 'required|integer',
            'list_kursi'    => 'required|json',
            'kapasitas'     => 'required|numeric',
        ]);

        Teater ::create([
            'nama_teater'   => $this->nama_teater,
            'bioskop_id'    => $this->id_bioskop,
            'list_kursi'    => $this->list_kursi,
            'kapasitas'     => $this->kapasitas,
        ]);

        $this->resetValue2();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('notify', 
        [ 'type' => 'success', 'message' => 'Teater Berhasil Ditambahkan']);
    }

    public function editBioskop($id) 
    {
        $bioskop = Bioskop::find($id);

        if (!$bioskop) 
        {
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('notify', 
            [ 'type' => 'failed', 'message' => 'Bioskop Tidak Ditemukan']);  
            return;
        }

        $this->bioskop_id = $id;
        $this->nama_bioskop = $bioskop->nama_bioskop; 
        $this->lokasi_bioskop = $bioskop->lokasi_bioskop;

    }

    public function editTeater($id) 
    {
        $teater = Teater::find($id);

        if (!$teater) 
        {
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('notify', 
            [ 'type' => 'failed', 'message' => 'Teater Tidak Ditemukan']);  
            return;
        }

        $this->teater_id = $id;
        $this->nama_teater = $teater->nama_teater; 
        $this->id_bioskop = $teater->id_bioskop;
        $this->list_kursi = $teater->list_kursi;
        $this->kapasitas = $teater->kapasitas;

    }

    public function updateBioskop() 
    {
        if (!Auth::user()->isSuperAdmin()) return;
        
        // Validate data to be updated
        $this->validate([ 
            'nama_bioskop'  => 'required|unique:gedung_bioskop,nama_bioskop',
            'lokasi_bioskop'=> 'required|string',
        ]);
        
        // Update data in database
        Bioskop::find($this->bioskop_id)->update(
        [
            'nama_bioskop'  => $this->nama_bioskop,
            'lokasi_bioskop'=> $this->lokasi_bioskop,
        ]);

        $this->resetValue1();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('notify', 
        [ 'type' => 'success', 'message' => 'Bioskop Berhasil Diperbarui']);
    }

    public function updateTeater() 
    {
        // Validate data to be updated
        $this->validate([ 
            'nama_teater'   => 'required|string|min:4',
            'bioskop_id '   => 'required|integer',
            'list_kursi'    => 'required|json',
            'kapasitas'     => 'required|numeric',
        ]);
        
        // Update data in database
        Teater::find($this->teater_id)->update(
        [
            'nama_teater'   => $this->nama_teater,
            'bioskop_id'    => $this->id_bioskop,
            'list_kursi'    => $this->list_kursi,
            'kapasitas'     => $this->kapasitas,
        ]);

        $this->resetValue2();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('notify', 
        [ 'type' => 'success', 'message' => 'Teater Berhasil Diperbarui']);
    }

    public function deleteBioskop($id)
    {
        if (!Auth::user()->isSuperAdmin()) return;
        
        $bioskop = Bioskop::find($id);

        if (!$bioskop) 
        {
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('notify', 
            [ 'type' => 'failed', 'message' => 'Bioskop Tidak Ditemukan']);  
            return;
        }

        $this->bioskop_id = $id;
        $this->nama_bioskop = $bioskop->nama_bioskop; 
        $this->lokasi_bioskop = $bioskop->lokasi_bioskop;
    }

    public function deleteTeater($id)
    {
        $teater = Teater::find($id);

        if (!$teater) 
        {
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('notify', 
            [ 'type' => 'failed', 'message' => 'Teater Tidak Ditemukan']);  
            return;
        }

        $this->teater_id = $id;
        $this->nama_teater = $teater->nama_teater; 
        $this->id_bioskop = $teater->id_bioskop;
        $this->list_kursi = $teater->list_kursi;
        $this->kapasitas = $teater->kapasitas;
    }

    public function delete1()
    {
        if (!Auth::user()->isSuperAdmin()) return;
        
        Bioskop::find($this->bioskop_id)->delete();

        $this->resetValue1();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('notify', 
        [ 'type' => 'success', 'message' => 'Bioskop Berhasil Dihapus']);
    }

    public function delete2()
    {
        Teater::find($this->teater_id)->delete();

        $this->resetValue2();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('notify', 
        [ 'type' => 'success', 'message' => 'Teater Berhasil Dihapus']);
    }

    public function resetValue1()
    {
        $this->nama_bioskop = '';
        $this->lokasi_bioskop = '';
    }

    public function resetValue2()
    {
        $this->nama_teater = '';
        $this->id_bioskop = null;
        $this->list_kursi = '';
        $this->kapasitas = 0;
    }
}
