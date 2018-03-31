@extends('layouts.app')

@section('content')

   @include('admin.includes.errors')

    <table class="table table-hover">
        <thead>
        <tr>
            <td>
                Post Name
            </td>
            <td>
                Images
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
        @foreach($posts as $post)
            <tr>
                <td>
                    {{$post->title}}


                </td>

                <td>
                    <img src="{{ $post->featured }}" width="50px" height="50px">
                </td>
                <td>

                        Edit
                </td>

                <td>
                    <a href="{{ route('posts.delete', ['id'=>$post->id]) }}" class="btn btn-danger">
                        Trash</a>
                </td>

                @endforeach

            </tr>


        </tbody>
    </table>

@endsection
