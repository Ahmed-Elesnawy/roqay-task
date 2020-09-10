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

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">@lang('dashbaord.create_role')</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('dashboard.roles.update',$role->id) }}" role="form">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                                    placeholder="Name" value="{{ $role->name }}">
                            </div>

                            <div class="form-group">
                                <select id="permissions-select" style="width: 100%" class="select2-input"
                                    name="permissions[]" multiple="multiple"
                                    >
                                    @foreach ($permissions as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection




@push('js')
    <script>
        $('#permissions-select').val({!! json_encode($role->permissions()->allRelatedIds()) !!}).trigger('change');
    </script>
@endpush
