<div>
    <x-session-status class="mb-4" :status="session('status')"/>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-5 mt-5">
        <h3 class="mb-3">Category list</h3>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#formCategory">
            Create Category
        </button>
        <table class="table table-hove table-sm">
            <thead>
            <tr class="table-dark">
                <th class="text-center">ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td class="action">
                        <button type="button"
                                wire:click="$emit('editCategory', {{ $category->id }})"
                                data-bs-toggle="modal" data-bs-target="#formCategory"
                                title="Edit Row"
                                class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </td>
                    <td class="action">
                        <button type="button"
                                wire:click="$emit('deleteCategory', {{ $category->id }})"
                                title="Remove Row"
                                class="btn btn-danger btn-sm">
                            <i class="fa fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center pb-5 pt-5">
                        <span class="h4">No data found...</span>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="pagination-wrap pt-3 d-flex align-items-baseline users-paginate mb-5">
            {{ $categories->links() }}
            <select class="form-select form-select-sm ms-5" style="width: 6%;!important;" wire:model="selectPerPage">
                @foreach($perPage as $item)
                    <option value="{{$item}}">{{$item}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <livewire:category-form/>
</div>
