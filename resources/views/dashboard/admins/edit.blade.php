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

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">@lang('dashbaord.edit_admin')</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('dashboard.admins.update',$admin->id) }}" role="form">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                                    placeholder="Name" value="{{ $admin->name }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    placeholder="Email" value="{{ $admin->email }}">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputPassword1">Roles</label>
                                <select id="roles-select" style="width: 100%" class="select2-input" name="roles[]"
                                    multiple="multiple">
                                    @foreach ($roles as $id => $name)
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
        var rolesSelect = $('#roles-select');
        rolesSelect.select2({

            theme:'classic',
            placeholder: 'Select a roles',

        });
        rolesSelect.val({!! json_encode($admin->roles()->allRelatedIds()) !!}).trigger('change');
    </script>
@endpush
