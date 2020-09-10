$(document).ready(function () {


    // Trigger select2 lib

    $('#permissions-select').select2({
        theme: "classic",
        placeholder: "Select a Permissions",
        allowClear: true
    });

    // Ajax Setup 

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Ajax create category

    $('#cat_form_btn').on('click', function (e) {


        e.preventDefault()

        var form   = $('#category_form'),
            data   = form.serialize(),
            url    = form.attr('action'),
            method = form.attr('method')


        $.ajax({

            type: method,
            url,
            data,

            success: function (data) {

                console.log(data.delete);

                var Editmodal = `
                <div class="modal fade" id="edit-category-${data.category.id}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form id="category-form-${data.category.id}" method="POST"
                                action="categories/${data.category.id}">
                <input type="hidden" name="_method" value="PUT"/>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger m-3 d-none" id="errors-${data.category.id}"></div>
                            

                                <div class="form-group">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Category name" value="${data.category.name}" />
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button data-id="${data.category.id}" type="submit" class="btn btn-primary edit-cat-btn">Update</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            `
                   deleteModal = `<div class="modal fade" id="delete-category-${data.category.id}" tabindex="-1" role="dialog"
                   aria-labelledby="exampleModalLabel" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                       <div class="modal-content">
                           
                           <div class="modal-body">
                               <form data-action="categories/${data.category.id}" id="delete-category-form-${data.category.id}" method="POST"
                                   action="categoires/${data.category.id}">
               
                                   <h4>Are You Sure ?</h4>
                           </div>
                           <div class="modal-footer">
                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                               <button data-id="${data.category.id}" type="submit" class="btn btn-danger delete-cat-btn">Yes</button>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
               `

                   deleteBtn = `<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-category-${data.category.id}">
                                  Delete
                                </button>`

                    
                   editBtn    = `<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-category-${data.category.id}">
                                    Edit
                                </button>`
                   
,

                    tableTrHtml = `
                                <tr id="category-${data.category.id}">
                        <td>${data.category.id}</td>
                        <td id="category-name-td-${data.category.id}">${data.category.name}</td>
                        <td id="category-slug-td-${data.category.id}">${data.category.slug}</td>
                        <td>
                            
                         
                            ${data.edit ? editBtn : ''}

                            ${data.delete ? deleteBtn: ''}


                        </td>
                    </tr>`;



                $('#categories_table tbody').prepend(tableTrHtml);
                $('#categories_table').prepend(Editmodal).prepend(deleteModal);

                $('#create-category').modal('hide');

                $('#category_input').val('');

                $('#category_form_errors').html('');


            },

            error: function (error) {

                $('#category_form_errors').html(`<div class="form-group">
               <span class="alert alert-danger">${error.responseJSON.errors.name[0]}</span></div>`)
            }
        })



    });


    // Ajax update category 


    $(document).on('click','.edit-cat-btn',function (e) {

        e.preventDefault()

        var categoryId = $(this).data('id'),
            form      = $(`#category-form-${categoryId}`),
            data      = form.serialize(),
            url       = form.attr('action'),
            method    = form.attr('method'),
            nameTd    = $(`#category-name-td-${categoryId}`),
            slugTd    = $(`#category-slug-td-${categoryId}`),
            modal     = $(`#edit-category-${categoryId}`),
            errorsDiv = $(`#errors-${categoryId}`);


        
        console.log(data);


        $.ajax({

            type: method,
            url,
            data,
            success: function (data) {
                console.log(data);
                errorsDiv.addClass('d-none')
                nameTd.text(data.name);
                slugTd.text(data.slug);
                modal.modal('hide');

                toastr.success('Category Updated!');
            },

            error: function (error) {
                console.log(error)
                errorsDiv.removeClass('d-none')
                $.each(error.responseJSON.errors, function (index, value) {
                    errorsDiv.append(`<li>${value}</li>`)
                })
            }
        })



    });


    // Ajax delete 

    $(document).on('click', '.delete-cat-btn', function (e) {

        e.preventDefault();

        var btn = $(this),
            categoryId = btn.data('id'),
            form = $(`#delete-category-form-${categoryId}`),
            data = form.serialize() + "&_method=DELETE",
            url = form.data('action'),
            type = form.attr('method'),
            tableTr = $(`#category-${categoryId}`),
            modal = $(`#delete-category-${categoryId}`);


            console.log(data);

        $.ajax({
            url,
            type,
            data,
            success: function (data) {
                console.log(data)
                tableTr.remove();
                modal.modal('hide');
                toastr.success('Category Deleted!')
            }
        })
    })


    // Ajax create category


    $(document).on('submit', '#product_form', function (e) {


        e.preventDefault();

        var form = $(this),
            data = form.serialize(),
            url = form.attr('action'),
            type = form.attr('method'),
            errorsDiv = $('#errors');


        $.ajax({
            url,
            type,
            data,

            success: function (data) {

                console.log(data)

                errorsDiv.addClass('d-none');

                $('#products_table tbody').prepend(`
                    <tr>
            <td>${data.id}</td>
            <td>${data.name}</td>
            <td>${data.desc}</td>
            <td>${data.price}</td>
            <td>${data.category_name}</td>
            <td>
                <a href="products/${data.id}/edit" class="btn btn-warning text-white">
                    Edit
                </a>

                <a href="products/${data.id}/destroy" class="btn btn-danger text-white cat-delete">
                    Delete
                </a>
            </td>
            </tr>`);


                $('#create-product').modal('hide');

                $('#product_name,#product_price,#product_desc,#product_category').val('')


            },


            error: function (error) {
                console.log(error)
                errorsDiv.html("").removeClass('d-none')


                $.each(error.responseJSON.errors, function (index, value) {
                    errorsDiv.append(`<li>${value}</li>`)
                })

            }


        })



    });


    // Ajax update product 


    $('#update_product_btn').click(function (e) {


        e.preventDefault()

        var form = $('#product_form'),
            data = form.serialize(),
            url = form.attr('action'),
            type = form.attr('method'),
            errorsDiv = $('#errors');





        $.ajax({

            type,
            url,
            data,

            success: function (data) {

                errorsDiv.addClass('d-none')
                $('#success').removeClass('d-none')
                $('#success').html(`<div class="form-group">
                    <span class="alert alert-success">Product Updated!</span></div>`)

            },

            error: function (error) {


                errorsDiv.html("").removeClass('d-none')
                $('#success').addClass('d-none')
                $.each(error.responseJSON.errors, function (index, value) {
                    errorsDiv.append(`<li>${value}</li>`)
                })
            }
        });





        $(document).on('click', '.product-delete', function (e) {

            e.preventDefault();

            var btn = $(this),
                url = btn.attr('href'),
                parentTr = btn.parent().parent();

            $.ajax({
                type: 'GET',
                url,
                success: function (data) {
                    console.log(data)
                    parentTr.remove();
                }

            })
        })





    });





})