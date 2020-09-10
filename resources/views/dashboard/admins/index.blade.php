@extends('layouts.dashboard.app')





@section('title', $title)



@section('content-header')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">@lang('dashboard.admins')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">@lang('dashboard.home')</a></li>
                    <li class="breadcrumb-item active">@lang('dashboard.admins')</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

@endsection


@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card align-content-center">
                    <div class="card-header">

                        @if (authAdmin()->can('create-admin'))

                        <!-- Button trigger modal -->

                        <a type="button" class="btn btn-warning" href="{{ route('dashboard.admins.create') }}">
                            Add Admin
                        </a>

                        @endif


                    </div>

                    <!-- /.card-header -->
                    <div id="table-card" class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Controls</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach( $admins as $admin )

                                    @include('dashboard.admins.table-tr')

                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">

                        {!! $admins->links() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
