<?php

namespace App\Http\Livewire;

use App\Models\StokBarang;
use Livewire\Component;

class TambahBarang extends Component
{
    public $items = [];
    public $idBarang;
    public $nama;
    public $jumlah;

    private function itemExists($id)
    {
        foreach ($this->items as $key => $item) {
            if ($item['id'] == $id) {
                return $key; // Mengembalikan indeks item jika ditemukan
            }
        }
        return null; // Mengembalikan null jika tidak ditemukan
    }
    
    public function tambahItem()
    {

        if (empty($this->nama) || empty($this->jumlah)) {
            session()->flash('error', 'Nama dan Jumlah tidak boleh kosong.');
            return;
        }

        $id = explode('|',$this->nama)[0];
        $nama = explode('|',$this->nama)[1];

        $existingItemIndex = $this->itemExists($id);
        
        if ($existingItemIndex !== null) {
            // Jika item dengan ID yang sama sudah ada, tambahkan jumlahnya
            $this->items[$existingItemIndex]['jumlah'] += $this->jumlah;
        } else {
            // Jika item dengan ID yang sama belum ada, tambahkan sebagai item baru
            $this->items[] = ['id' => $id, 'nama' => $nama, 'jumlah' => $this->jumlah];
        }
        $this->resetInputFields();
    }

    public function hapusItem($key)
    {
        unset($this->items[$key]);
    }

    public function simpanKeDatabase()
    {
        foreach ($this->items as $item) {
            StokBarang::create($item);
        }
        $this->reset('items');
    }

    private function resetInputFields()
    {
        $this->idBarang = '';
        $this->nama = null;
        $this->jumlah = '';
    }

    public function render()
    {
        return view('livewire.tambah-barang', [
            'stokbarang' => StokBarang::all(),
        ]);
    }
}
