<div wire:ignore.self class="modal fade" id="formProducts" tabindex="-1" aria-labelledby="formProducts" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formProducts">Create product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save">
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name"
                               placeholder="Product name"
                               wire:model.defer="productName">
                        @error('productName')
                        <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price"
                               placeholder="100"
                               wire:model.defer="price">
                        @error('price')
                        <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Category</label>
                        <select class="form-select" wire:model.defer="selectedCategory">
                            <option value="">Select category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('selectedCategory')
                        <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div> @enderror
                    </div>
                    @error('selectedPaymentMethod')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div> @enderror
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" wire:model.defer="description"
                                  rows="10" class="form-control"></textarea>
                        @error('description')
                        <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-10">
                        @if($photo)
                            <div class="mb-3 d-flex align-items-start">
                                <img
                                    src="{{ $isUploaded ? asset('public/storage/photos/'.$photo) : $photo->temporaryUrl() }}"
                                    class="me-3" alt="photo"
                                    style="max-height: 242px;max-width: 300px;object-fit: contain;object-position: left;">
                                <button class="btn btn-danger" wire:click="deletePhoto">delete</button>
                            </div>

                        @else
                            <div class="mb-3">
                                <label for="link" class="form-label">Photo</label>
                                <input type="file" class="form-control" id="photo" name="photo"
                                       wire:model.defer="photo">
                                @error('photo')
                                <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div> @enderror
                                <div wire:loading wire:target="photo">Uploading...</div>
                            </div>
                        @endif
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
