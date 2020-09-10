@extends('layouts.dashboard.app')





@section('title', $title)



@section('content-header')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">@lang('dashboard.users')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">@lang('dashboard.home')</a></li>
                    <li class="breadcrumb-item active">@lang('dashboard.users')</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

@endsection


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">@lang('dashbaord.create_user')</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div id="success" class="success d-none m-3">
                            <span class="alert alert-success">
                                Product Updated!
                            </span>
                        </div>

                        <form id="product_form" method="POST"
                            action="{{ route('dashboard.products.update', $product->id) }}">
                            @method("PUT")
                            @csrf
                            <div class="alert alert-danger d-none" id="errors"></div>
                            <div class="form-group">
                                <input value="{{ $product->name }}" id="product_name" type="text" name="name"
                                    class="form-control" placeholder="Product name" />
                            </div>

                            <div class="form-group">
                                <input value="{{ $product->price }}" id="product_price" type="number" name="price"
                                    class="form-control" placeholder="Price" />
                            </div>

                            <div class="form-group">
                                <textarea id="product_desc" class="form-control" name="desc"
                                    placeholder="Description">{{ $product->desc }}</textarea>
                            </div>

                            <div class="form-group">
                                <select id="product_category" name="category_id" class="form-control">
                                    <option value="">Select category</option>
                                    @foreach ($categories_choices as $id => $choice)
                                        <option {{ $product->category_id == $id ? 'selected' : '' }} value="{{ $id }}">
                                            {{ $choice }}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button id="update_product_btn" type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

@endsection
