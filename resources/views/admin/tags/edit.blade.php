@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Edit a Tag
        </div>
        <div class="panel panel-body">
            <form  action="{{ route('tag.update', ['id'=>$tags->id]) }}" method = post>
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">Tag</label>
                    <input name="tag" type="text" value="{{ $tags->tag  }}" class="form-control" id="name">
                </div>


                <button type="submit" class="btn btn-success">Edit tag</button>



            </form>
        </div>


    </div>

@endsection
