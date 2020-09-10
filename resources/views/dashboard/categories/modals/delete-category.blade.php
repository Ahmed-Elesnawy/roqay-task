<div class="modal fade" id="delete-category-{{ $category->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-body">
                <form data-action="{{ route('dashboard.categories.destroy',$category->id) }}" id="delete-category-form-{{ $category->id }}" method="POST"
                    action="{{ route('dashboard.categories.destroy', $category->id) }}">
                    @csrf
                    @method('DELETE')

                    <h4>Are You Sure ?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button data-id="{{ $category->id }}" type="submit" class="btn btn-danger delete-cat-btn">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
