@extends('layouts.app')

@section('content')

    <!--this will be the overlay that comes in small screens--> 
        <body>
            <div class="container-fluid">
                @include('include.navbar')
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="float-left">
                                <h2>Dates</h2>
                            </div>
                        </div>
                    </div>
                
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                <a type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                                {{ Session::get('message') }}
                            </div>
                        @endif

                        @if (Session::has('error-message'))
                            <div class="alert alert-danger" role="alert">
                                <a type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                                {{ Session::get('error-message') }}
                            </div>
                        @endif
                        <form action="{{ route('date.deleteAll') }}" method="POST">    
                        
                        @csrf
                        @method('DELETE')
                            
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="float-left">
                                        <input class="btn btn-danger" type="submit" name="submit" value="Delete All Selected"/>
                                    </div>
                                    <div class="float-right">
                                        <a class="btn btn-success" href="{{ route('available.create') }}"> Create New Day</a>
                                    </div>
                                </div>
                            </div>
                            <br>
                        <div class="table-responsive">
                            <!--Table-->
                            <table class="table">
                                <tr>
                                    <th class="text-center"> <input type="checkbox" id="checkAll"> </th>
                                    <th>No</th>
                                    <th>Start</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($dates as $date)
                                <tr>
                                    <td class="text-center"><input name='id[]' type="checkbox" id="checkItem" value="{{ $date->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $date->date }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('date.viewAll',$date) }}">See All</a>
                                    </td>
                                </tr>
                                </form>
                                @endforeach 
                            </table>
                        </div>    
                    <nav>
                        Showing {{ $dates->firstItem() }} to {{ $dates->lastItem() }} of total {{$dates->total()}} entries
                    </nav>

                    <ul class="pagination justify-content-center">
                        {!! $dates->links() !!}
                    </ul>


                </div>
            </div>
        </body>
        <script>
        $('#checkAll').click(function(event) {   
            if(this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;                        
            });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;                       
                });
            }
    }); 
            </script>
@endsection
