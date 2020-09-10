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
                    <form id="update_category_form" method="POST"
                        action="{{ route('dashboard.categories.update', $category->id) }}" role="form">
                      
                            <div id="success" class="success d-none m-3">
                                <span class="alert alert-success">
                                    Category Updated!
                                </span>
                            </div>
                
                        @method("PUT")
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                                    placeholder="Name" value="{{ $category->name }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input id="slug_input" disabled type="text" name="email" class="form-control"
                                    id="exampleInputEmail1" placeholder="Category slug" value="{{ $category->slug }}">
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button id="update_category_btn" type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
