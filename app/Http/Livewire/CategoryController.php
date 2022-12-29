<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryController extends Component
{
    public $categorySlug;

    public function render()
    {
        $this->categorySlug = request()->route()->parameter('categorySlug');
        return view('livewire.category-controller',[
            'category' => $this->getCategory()
        ]);
    }

    public function getCategory()
    {
        return Category::query()
            ->with('products')
            ->where('slug','=',$this->categorySlug)
            ->first();
    }
}
