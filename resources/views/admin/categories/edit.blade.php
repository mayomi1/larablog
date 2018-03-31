@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Edit a Category
        </div>
        <div class="panel panel-body">
            <form  action="{{ route('category.update', ['id'=>$category->id]) }}" method = post>
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" value="{{ $category->name  }}" class="form-control" id="name">
                </div>


                <button type="submit" class="btn btn-success">Edit Category</button>



            </form>
        </div>


    </div>

@endsection
