@extends('layouts.dashboard.app')


@section('content-header')


@stop


@section('content')

<h1>
    Welcome To Dashboard

    <form method="POST" action="{{ route('dashboard.logout') }}">
        @csrf
        <button class="btn btn-danger" type="submit">Logout</button>
    </form>
</h1>

@stop
