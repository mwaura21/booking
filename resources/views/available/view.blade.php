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
                                @php
                                    $days = $date->day->format("l jS F Y");
                                @endphp
                                <h2>{{ $days }}</h2>
                            </div>
                            <div class="float-right">
                                <a class="btn btn-success" href="{{ route('available.index') }}">Back</a>
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
                        <form action="{{ route('available.deleteAll') }}" method="POST">    
                        
                        @csrf
                        @method('DELETE')
                            
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="float-left">
                                        <input type="hidden" value="{{ Crypt::encryptString($date->id) }}" name="date">
                                        <input class="btn btn-danger" type="submit" name="submit" value="Delete All Selected"/>
                                    </div>
                                    <div class="float-right">
                                        <a class="btn btn-success" href="{{ route('available.create') }}">Create New Time</a>
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
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($available as $avail)
                                @php
                                    $start = $avail->start_time->format("h:i A");
                                    $end = $avail->end_time->format("h:i A");
                                @endphp
                                <tr>
                                    <td class="text-center"><input name='id[]' type="checkbox" id="checkItem" value="{{ Crypt::encryptString($avail->id) }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $start }}</td>
                                    <td>{{ $end }}</td>
                                    <td>@if($avail->available == 1)
                                        Available
                                        @else
                                        Not Available
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('available.edit',$avail) }}">Edit</a>
                                    </td>
                                </tr>
                                </form>
                                @endforeach 
                            </table>
                        </div>    
                    <nav>
                        Showing {{ $available->firstItem() }} to {{ $available->lastItem() }} of total {{$available->total()}} entries
                    </nav>

                    <ul class="pagination justify-content-center">
                        {!! $available->links() !!}
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
