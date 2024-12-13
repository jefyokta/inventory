<?php

namespace App\Livewire\Pages\Create;

use App\Models\Barang as ModelsBarang;
use Livewire\Component;

class Barang extends Component
{

    public $name, $stock, $category, $code;

    public function save()
    {
        $v =  $this->validate([
            'name' => 'required',
            'code' => 'required|unique:barangs,code',
            'stock' => 'required|numeric|min:0',
            'category' => 'required|in:bricks,nano block'
        ], [
            'name.required' => 'Nama barang wajib diisi.',
            'code.required' => 'Kode barang wajib diisi.',
            'code.unique' => 'Kode barang sudah terdaftar.',
            'stock.required' => 'Stok barang wajib diisi.',
            'stock.numeric' => 'Stok barang harus berupa angka.',
            'stock.min' => 'Stok barang tidak boleh kurang dari 0.',
            'category.required' => 'Kategori barang wajib diisi.',
            'category.in' => 'Kategori barang harus berupa salah satu dari: bricks atau nano block.',
        ]);

        ModelsBarang::insert($v);
        $this->dispatch('barang-created', 'barang berhasil ditambahkan');
        $this->reset('name', 'stock', 'category', 'code');
    }
    public function render()
    {
        return view('livewire.pages.create.barang');
    }
}
