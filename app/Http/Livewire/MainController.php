<?php

namespace App\Http\Livewire;


use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class MainController extends Component
{
    protected $listeners = [
        'setCategory'
    ];
    public $selectedCategories = [];
    public function render()
    {
        return view('livewire.main-controller',[
            'products' => $this->getAll(),
            'categories' => $this->getCategory()
        ]);
    }

    public function setCategory($data)
    {
        $this->selectedCategories = $data;
    }

    public function getCategory()
    {
        return Category::all();
    }

    public function getAll()
    {
        return Product::query()
            ->with('category')
            ->when($this->selectedCategories, function ($q) {
                $q->whereHas('category', function ($q) {
                    $q->whereIn('id', $this->selectedCategories);
                });
            })
            ->get();
    }
}
