<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Livewire\Component;

// Super Admin & Admin Bioskop
class BioskopController extends Component
{
    public function mount()
    {
        
    }

    public function render()
    {
        return view('Admin.bioskop')
            ->layoutData(['page' => 'Teater']);
    }
    public function storeBioskop(){
        $this->validate([
            'nama_bioskop'      => 'required|string',
            'lokasi_bioskop'     => 'required|string',

        ]);


        Bioskop ::create([
            'nama_bioskop'  => $this->nama_bioskop,
            'lokasi_bioskop'  => $this->lokasi_bioskop,
        ]);

        $this->resetValue();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('notify', 
        [ 'type' => 'success', 'message' => 'Bioskop Berhasil Ditambahkan']);

    }

    public function storeTeater(){
        $this->validate([
            'nama_teater'      => 'required|string',
            'id_bioskop '     => 'required|string',
            'list_kursi'  => 'required|string|integer',
            'kapasitas'      => 'required|string',

        ]);


        Teater ::create([
            'nama_teater'  => $this->nama_teater,
            'id_bioskop'  => $this->id_bioskop,
            'list_kursi'  => $this->list_kursi,
            'kapasitas' => $this->kapasitas,
        ]);

        $this->resetValue();
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
        // Validate data to be updated
        $this->validate([ 
            'nama_bioskop'      => 'required|string',
            'lokasi_bioskop'     => 'required|string',
        ]);
        
        // Update data in database
        Bioskop::find($this->bioskop_id)->update(
        [
            'nama_bioskop'  => $this->nama_bioskop,
            'lokasi_bioskop'  => $this->lokasi_bioskop,
        ]);

        $this->resetValue();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('notify', 
        [ 'type' => 'success', 'message' => 'Bioskop Berhasil Diperbarui']);
    }

    public function updateTeater() 
    {
        // Validate data to be updated
        $this->validate([ 
            'nama_teater'      => 'required|string',
            'id_bioskop '     => 'required|string',
            'list_kursi'  => 'required|string|integer',
            'kapasitas'      => 'required|string',
        ]);
        
        // Update data in database
        Teater::find($this->teater_id)->update(
        [
            'nama_teater'  => $this->nama_teater,
            'id_bioskop'  => $this->id_bioskop,
            'list_kursi'  => $this->list_kursi,
            'kapasitas' => $this->kapasitas,
        ]);

        $this->resetValue();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('notify', 
        [ 'type' => 'success', 'message' => 'Teater Berhasil Diperbarui']);
    }
    public function deleteBioskop($id)
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
        Bioskop::find($this->bioskop_id)->delete();

        $this->resetValue();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('notify', 
        [ 'type' => 'success', 'message' => 'Bioskop Berhasil Dihapus']);
    }

    public function delete2()
    {
        Teater::find($this->teater_id)->delete();

        $this->resetValue();
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
        $this->id_bioskop = '';
        $this->list_kursi = '';
        $this->kapasitas = '';
    }
}
