@extends('layouts.app')

@section('content')

<div class="container-fluid">
    @include('include.navbar')
    <div class="container-fluid admin-container row">
        <div class="col-md-6">
            <a href="" class="btn btn-outline-light" role="button">Bookings
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('available.index') }}" class="btn btn-outline-light" role="button">Available
            </a>
        </div>
    </div>         
</div>

@endsection