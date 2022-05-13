@extends('layouts.app')

@section('content')

<body>
    <!--this will be the overlay that comes in small screens--> 
    <div class="container-fluid">
        @include('include.navbar')
        @if (Route::current()->getName() == 'date.create')
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="float-left">
                        <h2>Add New Day</h2>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-success" href="{{ route('available.index') }}">Back</a>
                    </div>
                </div>
            </div>
        
            <form action="{{ route('date.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            @php
                                $date = date('Y-m-d');
                            @endphp
                            <strong>Date</strong>
                            <input placeholder="Select day" type="date" name="day" class="form-control @error('day') is-invalid @enderror" min="{{ $date }}" autofocus>
                        </div>

                        @error('day')
                            <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            
            </form>
        </div>
        @elseif (Route::current()->getName() == 'available.create')
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="float-left">
                        <h2>Add New Category</h2>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-success" href="{{ url()->previous() }}"> Back</a>
                    </div>
                </div>
            </div>
        
            <form action="{{ route('available.store') }}" method="POST">
                @csrf
            
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            @php
                                $date = date('Y-m-d');
                            @endphp
                            <strong>Start Time</strong>
                            <input placeholder="Start Time" type="time" name="start_time" class="form-control @error('start_time') is-invalid @enderror" min="{{ $date }}" autofocus>
                        </div>

                        @error('start_time')
                            <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            @php
                                $date = date('Y-m-d');
                            @endphp
                            <strong>End Time</strong>
                            <input placeholder="End Time" type="time" name="end_time" class="form-control @error('end_time') is-invalid @enderror" autofocus>
                        </div>

                        @error('end_time')
                            <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            
            </form>
        </div>
        @endif
    </div>
</body>
@endsection
