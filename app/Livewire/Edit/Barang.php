<?php

namespace App\Livewire\Edit;

use App\Models\Barang as ModelsBarang;
use Livewire\Component;

class Barang extends Component
{

    public ModelsBarang $barang;

    public $name;
    public $code;
    public $category;

    public function save()
    {
        $v =  $this->validate(['name' => 'required|max:200', 'code' => 'unique:barangs,code,' . $this->barang->id.'|required|max:100', 'category' => 'required|in:nano block,bricks']);
        $this->barang->update($v);
        $this->dispatch('updated');
    }

    public function mount(ModelsBarang $barang)
    {
        $this->barang = $barang;
        $this->name = $this->barang->name;
        $this->code = $this->barang->code;
        $this->category = $this->barang->category;

    }
    public function render()
    {
        return view('livewire.edit.barang');
    }
}
