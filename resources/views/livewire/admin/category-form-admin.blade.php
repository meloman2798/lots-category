<div wire:ignore.self class="modal fade" id="formCategory" tabindex="-1" aria-labelledby="formCategory" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formCategory">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" wire:model.defer="name" class="form-control" id="name">
                        @error('name')
                        <div class="alert alert-danger mt-1" role="alert">{{ $message }}</div> @enderror
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
