@extends('layouts.app')

@section('content')

    @include('admin.includes.errors');

    <table class="table table-hover">
        <thead>
        <tr>
            <td>
                Tag Name
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
        @foreach($tags as $tag)
            <tr>
                <td>
                    {{$tag->tag}}


                </td>
                <td>
                    <a href="{{route('tag.edit', ['id'=> $tag->id])}}" class="btn btn-info">
                        Edit </a>
                </td>

                <td>
                    <a href="{{route('tag.delete', ['id'=> $tag->id])}}" class="btn btn-danger">
                        Delete
                    </a>
                </td>

                @endforeach

            </tr>


        </tbody>
    </table>

@endsection
