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
                Edit
            </td>
            <td>
                Restore
            </td>
        </tr>

        </thead>

        <tbody>
        @foreach($trashed as $post)
            <tr>
                <td>
                    {{$post->title}}


                </td>

                <td>
                    <img src="{{ $post->featured }}" width="50px" height="50px">
                </td>
                <td>

                    <a href="{{ route('posts.kill', ['id' => $post->id]) }}" class="btn btn-danger">Delete permanently</a>
                </td>

                <td>
                    <a href="{{ route('posts.restore', ['id'=>$post->id]) }}" class="btn btn-info">
                        Restore</a>
                </td>

                @endforeach

            </tr>


        </tbody>
    </table>

@endsection
