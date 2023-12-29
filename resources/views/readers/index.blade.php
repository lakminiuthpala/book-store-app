@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>Readers                  
            
                </h2>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-striped table-hover">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
     @foreach ($readers as $reader)
     <tr>
         <td>{{ $reader->first_name . " ". $reader->last_name }}</td>
         <td>{{ $reader->email }}</td>
         <td>{{ $reader->status }}</td>
         <td>
                
                    <a class="btn btn-primary" href="{{ route('reader.edit',$reader->id) }}">Edit</a>
                    <!-- @can('book-edit') -->
                    <a class="btn btn-primary" href="{{ route('reader.edit',$reader->id) }}">Edit</a>
                    <!-- @endcan -->

                
         </td>
     </tr>
     @endforeach
    </table>

@endsection 