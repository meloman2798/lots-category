<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductController extends Component
{
    public $productSlug;

    public function render()
    {
        $this->productSlug = request()->route()->parameter('productSlug');
        return view('livewire.product-controller',[
            'product' => $this->getProduct()
        ]);
    }

    public function getProduct()
    {
        return Product::query()->where('slug','=',$this->productSlug)->first();
    }
}
