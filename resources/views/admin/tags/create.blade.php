@extends('layouts.app')

@section('content')

    @include('admin.includes.errors');

    <div class="panel panel-default">
        <div class="panel-heading">
            Create a Tag
        </div>
        <div class="panel panel-body">
            <form  action="{{ route('tag.store') }}" method = post>
                {{csrf_field()}}

                <div class="form-group">
                    <label for="tag">Tag</label>
                    <input name="tag" type="text" class="form-control" id="tag">
                </div>


                <button type="submit" class="btn btn-success">Create Tag</button>



            </form>
        </div>


    </div>

@endsection
