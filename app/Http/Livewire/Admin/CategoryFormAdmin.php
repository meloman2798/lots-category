<?php

namespace App\Http\Livewire\Admin;

use App\Http\Traits\HideModal;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class CategoryFormAdmin extends Component
{
    use HideModal;
    public $name;
    public $slug;
    public $categoryEdit;
    public $modalId = 'formCategory';

    protected $listeners = [
        'editCategory' => 'edit'
    ];

    protected $rules = [
        'name'=> 'required|string|unique:categories|regex:/^[a-zA-Z\s\.]+$/',
    ];

    protected array $messages = [
        'name.regex' => 'Only letters',
        'name.required' => 'This field must be required',
    ];

    public function render()
    {
        return view('livewire.admin.category-form-admin');
    }

    public function save()
    {
        $this->validate();
        $this->slug = Str::slug($this->name);

        $categoryId = 0;
        if ($this->categoryEdit) {
            $categoryId = $this->categoryEdit;
        }

        Category::updateOrCreate(
            [
                'id' => $categoryId
            ],
            [
                'name' => $this->name,
                'slug' => $this->slug,
            ]);

        $this->closeModal($this->modalId);
        $this->resetForm();
        $this->emit('refreshCategoryTable');
        $this->emit('success');
    }

    public function edit($id)
    {
        $category = Category::query()->find($id);
        $this->categoryEdit = $category->id;
        $this->name = $category->name;
    }

    public function resetForm()
    {
        $this->reset(['categoryEdit','name']);
    }
}
