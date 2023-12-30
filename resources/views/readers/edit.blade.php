@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>Edit Reader

                    <div class="float-end">
                        <a class="btn btn-primary" href="{{ route('readers.index') }}"> Back</a>
                    </div>
                </h2>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reader.update', $reader->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 mb-3">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $reader->first_name . ' '. $reader->last_name }}" class="form-control" readonly
                        placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="email" value="{{ $reader->email}}" class="form-control" readonly
                        placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group">
                    <strong>User Type:</strong>
                    <input type="text" name="user_type" value="{{ $reader->user_type}}" class="form-control" readonly
                        placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select name="status" class="form-control">
                        <option value="Active" {{$reader->status == 'active'  ? 'selected' : ''}}>Active</option>
                        <option value="Inactive" {{$reader->status == 'inactive'  ? 'selected' : ''}}>Inactive</option>
                    </select>
                    </div>
            </div>
            <div class="col-xs-12 mb-3 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection