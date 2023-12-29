@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>Employees   </h2>               
            
            <div class="float-end">
                
            </div>
                
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
            <th>User Type</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
     @foreach ($employees as $employee)
     <tr>
         <td>{{ $employee->first_name . " ". $employee->last_name }}</td>
         <td>{{ $employee->email }}</td>
         <td>{{ $employee->user_type }}</td>
         <td>{{ $employee->status }}</td>
         <td>
                    <!-- @can('book-edit') -->
                    <a class="btn btn-primary" href="{{ route('employee.edit',$employee->id) }}">Edit</a>
                    <!-- @endcan -->


         </td>
     </tr>
     @endforeach
    </table>

@endsection 