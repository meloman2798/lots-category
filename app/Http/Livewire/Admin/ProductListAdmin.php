<?php

namespace App\Http\Livewire\Admin;

use App\Http\Traits\PerPage;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductListAdmin extends Component
{
    use PerPage;
    use WithPagination;

    public $selectPerPage = 10;

    protected string $paginationTheme = 'bootstrap';

    protected $listeners = [
        'refreshProductTable' => '$refresh',
        'success'
    ];

    public function render()
    {
        return view('livewire.admin.product-list-admin',[
            'products' => $this->getProducts($this->selectPerPage),
            'perPage' => $this->perPage(),
        ]);
    }

    public function success()
    {
        session()->flash('status', 'Request successfully saved!');
    }

    public function getProducts($perPage): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Product::query()->paginate($perPage);
    }
}
