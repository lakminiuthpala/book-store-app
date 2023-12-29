@extends('layouts.master')
<li><a class="nav-link" href="{{ route('books.index') }}">Manage Books</a></li>
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>Borrowed History                  
            
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
            <th>Book</th>
            <th>Borrowed Date</th>
            <th>Return Date</th>
            <th>Is Returned</th>
        </tr>
     @foreach ($readers as $reader)
     <tr>
         <td>{{ $reader->name }}</td>
         <td>{{ $reader->issued_at }}</td>
         <!-- <td>{{ $reader->status }}</td> -->
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