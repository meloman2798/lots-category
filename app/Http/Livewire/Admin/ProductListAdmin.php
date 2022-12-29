<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ProductListAdmin extends Component
{
    protected $listeners = [
        'refreshProductTable' => '$refresh',
        'success'
    ];

    public function render()
    {
        return view('livewire.admin.product-list-admin',[
            'products' => $this->getProducts()
        ]);
    }

    public function success()
    {
        session()->flash('status', 'Request successfully saved!');
    }

    public function getProducts(): Collection|array
    {
        return Product::query()->get();
    }
}
