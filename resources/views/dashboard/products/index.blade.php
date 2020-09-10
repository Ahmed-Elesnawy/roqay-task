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
                <div class="card align-content-center">
                    <div class="card-header">

                        @if (authAdmin()->can('read-product'))

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#create-product">
                                Add Product
                            </button>

                            <!-- Modal -->

                            @include('dashboard.products.modals.create-product')

                        @endif

                    </div>
                    <!-- /.card-header -->
                    <div id="table-card" class="card-body">
                        <table id="products_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#ID</th>
                                    <th>Name</th>
                                    <th>description</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Controls</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)

                                    @include('dashboard.products.table-tr')

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {!! $products->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
