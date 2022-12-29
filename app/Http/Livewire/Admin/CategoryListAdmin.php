<?php

namespace App\Http\Livewire\Admin;

use App\Http\Traits\PerPage;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryListAdmin extends Component
{
    use PerPage;
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    protected $listeners = [
        'refreshCategoryTable' => '$refresh',
        'success',
        'deleteCategory'
    ];

    public int $selectPerPage = 10;


    public function render()
    {
        return view('livewire.admin.category-list-admin',[
            'categories' => $this->getCategories($this->selectPerPage),
            'perPage' => $this->perPage(),
        ]);
    }


    public function getCategories($perPage)
    {
        return Category::query()->paginate($perPage);
    }

    public function success()
    {
        session()->flash('status', 'Request successfully saved!');
    }

    public function deleteCategory($id)
    {
        $result = Category::query()->find($id);
        $result->delete();
        $this->emit('refreshCategoryTable');
    }
}
