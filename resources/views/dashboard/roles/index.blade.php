@extends('layouts.dashboard.app')





@section('title', $title)



@section('content-header')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">@lang('dashboard.roles')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">@lang('dashboard.home')</a></li>
                    <li class="breadcrumb-item active">@lang('dashboard.roles')</li>
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

                        @if ( authAdmin()->can('create-role') )

                        <!-- Button trigger modal -->
                        <a type="button" class="btn btn-warning" href="{{ route('dashboard.roles.create') }}">
                            Add Role
                        </a>

                        @endif

                        
                        
                    </div>
                    <!-- /.card-header -->
                    <div id="table-card" class="card-body">
                        <table id="roles_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#ID</th>
                                    <th style="width:25%">Name</th>
                                    <th style="width:50%">Permissions</th>
                                    <th>Controls</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $roles as $role )

                                    @include('dashboard.roles.table-tr')

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {!! $roles->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
