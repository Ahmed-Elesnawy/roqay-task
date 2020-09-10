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
                    <form method="POST" action="{{ route('dashboard.users.update', $user->id) }}" role="form">
                        @method("PUT")
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                                    placeholder="Name" value="{{ $user->name }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    placeholder="Email" value="{{ $user->email }}">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>




                            <div id="address">
                                @foreach ($user->address as $key => $address)
                                <div id="input-{{ $key + 1 }}" class="form-group">
                                    <input value="{{ $address }}" name="address[]" type="text" class="form-control col-md-6 d-inline-block" id="exampleInputPassword1"
                                        placeholder="Address {{ $key + 1 }}">
                                    <a href="#" data-id="input-{{ $key + 1 }}" id="remove-{{ $key + 1 }}" class="btn btn-danger text-white d-inline-block remove-input">X</a>
                                </div>
                                @endforeach
                            </div>



                            <div class="form-group">
                                <button id="add_address" class="btn btn-warning text-white">Add Address</button>
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
        $(function() {

            var inputCount = {{ count($user->address) }};

            // Add Address Input

            $('#add_address').click(function(e) {

                e.preventDefault();

                inputCount++;


                if (inputCount > 0) $('#remove_address').removeClass('d-none');

                var inputHtml = `<div id="input-${inputCount}" class="form-group">
                                    <input name="address[]" type="text" class="form-control col-md-6 d-inline-block" id="exampleInputPassword1"
                                        placeholder="Address ${inputCount}">
                                    <a href="#" data-id="input-${inputCount}" id="remove-${inputCount}" class="btn btn-danger text-white d-inline-block remove-input">X</a>
                                </div>`

                $('#address').append(inputHtml);

            });

            // Remove Address Input


            // Remove Address Input


            $(document).on('click','.remove-input',function(e){

                e.preventDefault();

                $(this).parent().remove();
            })


        })

    </script>

@endpush
