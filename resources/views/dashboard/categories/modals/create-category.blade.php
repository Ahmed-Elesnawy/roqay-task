<div class="modal fade" id="create-category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="category_form" method="POST" action="{{ route('dashboard.categories.store') }}">
                    <div id="category_form_errors"></div>
                    @csrf
                    <div class="form-group">
                        <input id="category_input" type="text"
                         name="name"
                         class="form-control"
                         placeholder="Category name"
                        />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="cat_form_btn" type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
