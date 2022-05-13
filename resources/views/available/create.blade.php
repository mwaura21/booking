@extends('layouts.newadmin')

@section('content')

<body>
    <!--this will be the overlay that comes in small screens--> 
    <div class="container-fluid">

        @if (Route::current()->getName() == 'available.create')
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="float-left">
                        <h2>Add New Time</h2>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-success" href=""> Back</a>
                    </div>
                </div>
            </div>
        
            <form action="{{ route('available.store') }}" method="POST">
                @csrf
                <input type="hidden" value="" name="category">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Title</strong>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" value="{{ old('title') }}" autofocus>
                        </div>

                        @error('title')
                            <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror

                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Price</strong>
                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Price" value="{{ old('price') }}" autofocus>
                        </div>

                        @error('price')
                            <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror
                        
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Description</strong>
                            <textarea style="resize: none;" rows="5" cols="5" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description" >{{ old('description') }}</textarea>
                        </div>

                        @error('description')
                            <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            
            </form>
        </div>
        @elseif (Route::current()->getName() == 'category.create')
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
        
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
            
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name</strong>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}" autofocus>
                        </div>

                        @error('title')
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
