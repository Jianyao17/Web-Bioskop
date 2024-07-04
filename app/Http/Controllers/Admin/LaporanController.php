<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Penjualan;

// Super Admin & Admin Bioskop
class LaporanController extends Component
{
    public $tgl_laporan, $id_bioskop, $jml_penjualan, $kursi_terjual, $pendapatan_rp;
    public $laporans, $laporan_id;

    public function mount()
    {

    }
    
    public function render()
    {
        $this->laporans = Penjualan::all();

        return view('Admin.laporan')
            ->layoutData(['page' => 'Laporan']);
    }
    public function store()
    {
        if (!Auth::user()->isSuperAdmin()) return;

        $this->validate([
            'tgl_laporan'        => 'reuired|DateTime',
            'id_bioskop'         => 'required|integer',
            'jml_penjualan'        => 'required|numeric',
            'kursi_terjual'     => 'required|string',
            'pendapatan_rp'     => 'required|string',
        ]);

        Laporan::create([
            'tgl_laporan'   => $this->tgl_laporan,
            'id_bioskop'    => $this->id_bioskop,
            'jml_penjualan'  => $this->jml_penjualan,
            'kursi_terjual'     => $this->kursi_terjual,
            'pendapatan_rp'        =>$this->pendapatan_rp,
        ]);

        $this->resetValue();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('notify', 
        [ 'type' => 'success', 'message' => 'Laporan Berhasil Ditambahkan']);

    }

    public function editLaporan($id) 
    {
        $laporan = Laporan::find($id);

        if (!$laporan) 
        {
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('notify', 
            [ 'type' => 'failed', 'message' => 'Laporan Tidak Ditemukan']);  
            return;
        }
        $this->laporan_id      = $id;
        $this->tgl_laporan        = $laporan->tgl_laporan;
        $this->id_bioskop       = $laporan->id_bioskop;
        $this->jml_penjualan    = $laporan->jml_penjualan;
        $this->kursi_terjual       = $laporan->kursi_terjual;
        $this->pendapatan_rp       = $laporan->pendapatan_rp;
    }

    public function update() 
    {
        if (!Auth::user()->isSuperAdmin()) return;
        
        // Validate data to be updated
        $this->validate([ 
          'tgl_laporan'        => 'reuired|DateTime',
            'id_bioskop'         => 'required|integer',
            'jml_penjualan'        => 'required|numeric',
            'kursi_terjual'     => 'required|string',
            'pendapatan_rp'     => 'required|string',
        ]);

        // Update data in database
        Laporan::find($this->laporan_id)->update(
        [
            'tgl_laporan'   => $this->tgl_laporan,
            'id_bioskop'    => $this->id_bioskop,
            'jml_penjualan'  => $this->jml_penjualan,
            'kursi_terjual'     => $this->kursi_terjual,
            'pendapatan_rp'        =>$this->pendapatan_rp,
        ]);

        $this->resetValue();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('notify', 
        [ 'type' => 'success', 'message' => 'Laporan Berhasil Diperbarui']);
    }

    public function deleteLaporan($id)
    {
        $laporan = Laporan::find($id);

        if (!$laporan) 
        {
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('notify', 
            [ 'type' => 'failed', 'message' => 'Laporan Tidak Ditemukan']);  
            return;
        }

        $this->laporan_id      = $id;
        $this->tgl_laporan        = $laporan->tgl_laporan;
        $this->id_bioskop       = $laporan->id_bioskop;
        $this->jml_penjualan    = $laporan->jml_penjualan;
        $this->kursi_terjual       = $laporan->kursi_terjual;
        $this->pendapatan_rp       = $laporan->pendapatan_rp;
    }

    public function delete()
    {
        if (!Auth::user()->isSuperAdmin()) return;

        Film::find($this->film_id)->delete();
        Storage::delete($this->poster);

        $this->resetValue();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('notify', 
        [ 'type' => 'success', 'message' => 'Laporan Berhasil Dihapus']);
    }

    public function resetValue()
    {
        $this->tgl_laporan       = '';
        $this->id_bioskop       = '';
        $this->jml_penjualan    = '';
        $this->kursi_terjual       = '';
        $this->pendapatan_rp       = '';
    }
}

