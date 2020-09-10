<div class="modal fade" id="create-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="product_form" method="POST" action="{{ route('dashboard.products.store') }}">
                    <div class="alert alert-danger d-none" id="errors"></div>
                    @csrf
                    <div class="form-group">
                        <input id="product_name" type="text" name="name" class="form-control" placeholder="Product name" />
                    </div>

                    <div class="form-group">
                        <input id="product_price" type="number" name="price" class="form-control" placeholder="Price" />
                    </div>

                    <div class="form-group">
                        <textarea id="product_desc" class="form-control" name="desc" placeholder="Description"></textarea>
                    </div>

                    <div class="form-group">
                        <select id="product_category" name="category_id" class="form-control">
                            <option value="">Select category</option>
                            @foreach ($categories_choices as $id => $choice)
                                <option value="{{ $id }}">{{ $choice }}</option>
                            @endforeach
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="product_form_btn" type="submit" class="btn btn-primary">Add Product</button>
            </div>
            </form>
        </div>
    </div>
</div>
