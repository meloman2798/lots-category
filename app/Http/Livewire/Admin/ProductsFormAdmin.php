<?php

namespace App\Http\Livewire\Admin;

use App\Http\Traits\HideModal;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductsFormAdmin extends Component
{
    use WithFileUploads;
    use HideModal;

    protected $listeners = [
        'editProduct' => 'edit',
        'deleteProduct'
    ];

    public $productName;
    public $selectedCategory;
    public $photo;
    public $slug;
    public $price;
    public $description;
    public $productEdit;
    public $modalId = 'formProducts';
    public bool $isUploaded = false;

    protected array $rules = [
        'productName' => 'required|string|min:1',
        'price' => 'required|integer',
        'selectedCategory' => 'required',
        'description' => 'required'
    ];

    protected array $message = [
        'productName.required' => 'The Name field cannot be empty',
        'price.required' => 'The Price field must be number',
    ];

    public function render()
    {
        return view('livewire.admin.products-form-admin',[
            'categories' => $this->categories()
        ]);
    }

    public function categories()
    {
        return Category::all();
    }

    public function deletePhoto()
    {
        $this->photo = '';
        $this->isUploaded = false;
    }

    public function resetForm()
    {
        $this->reset(
            [
                'productName',
                'photo',
                'price',
                'description',
                'selectedCategory'
            ]
        );

        $this->isUploaded = false;
    }

    public function save()
    {
        $this->validate();

        $this->slug = Str::slug($this->productName);

        if (is_string($this->photo)) {
            $this->validate([
                'photo' => 'required',
            ]);
            $imgFile = $this->photo;
        } else {
            $this->validate([
                'photo' => 'required|image|max:1024',
            ]);
            $imgFile = $this->photo->store('/', 'photos');
        }

        $productId = 0;
        if ($this->productEdit) {
            $productId = $this->productEdit;
        }


        Product::updateOrCreate(
            [
                'id' => $productId
            ],
            [
                'name' => $this->productName,
                'slug' => $this->slug,
                'price' => $this->price,
                'description' => $this->description,
                'img' => $imgFile,
                'category_id' => $this->selectedCategory
            ]);

        $this->isUploaded = true;

        $this->closeModal($this->modalId);
        $this->resetForm();
        $this->emit('refreshProductTable');
        $this->emit('success');
    }

    public function edit($id)
    {
        $product = Product::query()->find($id);
        $this->productName = $product->name;
        $this->price = $product->price;
        $this->selectedCategory = $product->category->id;
        $this->description = $product->description;
        if (empty($product->img)) {
            $this->isUploaded = false;
        } else {
            $this->isUploaded = true;
        }
        $this->photo = $product->img;
        $this->productEdit = $product->id;
    }

    public function deleteProduct($id)
    {
        $result = Product::query()->find($id);
        $result->delete();
        $this->emit('refreshProductTable');
    }
}
