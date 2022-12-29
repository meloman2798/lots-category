<div>
    <x-session-status class="mb-4" :status="session('status')"/>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-5 mt-5">
        <h3 class="mb-3">Products list</h3>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#formProducts">
            Create Products
        </button>
        <table class="table table-hove table-sm">
            <thead>
            <tr class="table-dark">
                <th class="text-center">ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Description</th>
                <th>Price</th>
                <th>Img</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->slug}}</td>
                    <td>{{$product->description}}</td>
                    <td>${{$product->price}}</td>
                    <td>
                        <img style="max-height: 70px;object-fit: contain;object-position: center;" src="{{asset('public/storage/photos/'.$product->img)}}">
                    </td>
                    <td class="action">
                        <button type="button"
                                wire:click="$emit('editProduct', {{ $product->id }})"
                                data-bs-toggle="modal" data-bs-target="#formProducts"
                                title="Edit Row"
                                class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </td>
                    <td class="action">
                        <button type="button"
                                wire:click="$emit('deleteProduct', {{ $product->id }})"
                                data-bs-toggle="modal" data-bs-target="#deleteModal"
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
        {{--        <div class="pagination-wrap pt-3 d-flex align-items-baseline users-paginate mb-5">--}}
        {{--            {{ $invoices->links() }}--}}
        {{--            <select class="form-select form-select-sm ms-5" style="width: 6%;!important;" wire:model="selectPerPage">--}}
        {{--                @foreach($perPage as $item)--}}
        {{--                    <option value="{{$item}}">{{$item}}</option>--}}
        {{--                @endforeach--}}
        {{--            </select>--}}
        {{--        </div>--}}
    </div>
    <livewire:product-form/>
</div>
