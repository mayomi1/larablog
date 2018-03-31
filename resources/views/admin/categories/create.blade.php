@extends('layouts.app')

@section('content')

    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            Create a Category
        </div>
        <div class="panel panel-body">
            <form  action="{{ route('category.store') }}" method = post enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control" id="name">
                </div>


                <button type="submit" class="btn btn-success">Create Category</button>



            </form>
        </div>


    </div>

@endsection
