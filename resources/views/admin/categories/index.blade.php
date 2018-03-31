@extends('layouts.app')

@section('content')

    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif

    <table class="table table-hover">
        <thead>
            <tr>
                <td>
                    Category Name
                </td>
                <td>
                    Editing
                </td>
                <td>
                    Deleting
                </td>
            </tr>

        </thead>

        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>
                    {{$category->name}}


                </td>
                <td>
                    <a href="{{route('category.edit', ['id'=> $category->id])}}" class="btn btn-info">
                        Edit </a>
                </td>

                <td>
                    <a href="{{route('category.delete', ['id'=> $category->id])}}" class="btn btn-danger">
                        Delete
                        </a>
                </td>

                @endforeach

            </tr>


        </tbody>
    </table>

@endsection
