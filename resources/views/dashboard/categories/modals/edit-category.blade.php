<form id="category-form-{{ $category->id }}" method="POST"
    action="{{ route('dashboard.categories.update', $category->id) }}">
    <div class="modal fade" id="edit-category-{{ $category->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger m-3 d-none" id="errors-{{ $category->id }}"></div>
                    @method("PUT")
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Category name"
                            value="{{ $category->name }}" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button data-id="{{ $category->id }}" type="submit"
                        class="btn btn-primary edit-cat-btn">Update</button>

                </div>
            </div>
        </div>
</form>
</div>
