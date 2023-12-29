@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>Books                  
            <div class="float-end  pull-right">
            <a class="btn btn-success" href="{{ route('book.create') }}"> Create New Book</a>
              @can('create books')
              <a class="btn btn-success" href="{{ route('book.create') }}"> Create New Book</a>
              @endcan
            </div>
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
            <th>Author</th>
            <th>Availability</th>
            <th>Available Count</th>
            <th>Issued Count</th>
            <th width="280px">Action</th>
        </tr>
     @foreach ($books as $book)
     <tr>
         <td>{{ $book->name }}</td>
         <td>{{ $book->author }}</td>
         <td>@if($book->total_book_count > $book->issued_count)
                {{ 'Available' }}
            @else
                {{'Not Available'}}
            @endif
        </td>
        <td>{{$book->total_book_count - $book->issued_count }}</td>
        <td>{{ $book->issued_count }}</td>
         <td>
                <form action="{{ route('book.destroy',$book->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('book.show',$book->id) }}">Show</a>
                    
                    <a class="btn btn-primary" href="{{ route('book.issue',$book->id) }}">Issue</a>
                    
                    @can('edit-books')
                    <a class="btn btn-primary" href="{{ route('book.edit',$book->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <!-- @can('book-delete') -->
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <!-- @endcan -->
                </form>
         </td>
     </tr>
     @endforeach
    </table>

@endsection 