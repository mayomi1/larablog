@extends('layouts.app')

@section('content')

    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create a post
                    </div>
                    <div class="panel panel-body">
                        <form  action="{{ route('posts.store') }}" method = post enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input name="title" type="text" class="form-control" id="title">
                            </div>

                            <div class="form-group">
                                <label for="featured">Feature Image</label>
                                <input name="featured" type="file" class="form-control" id="featured">
                            </div>

                            <div class="form-group">
                                <label for="category">Select Category</label>
                               <select name="category_id" id="category" class="form-control">
                                   @foreach($category as $cat)
                                   <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                   @endforeach
                               </select>
                            </div>

                            <div class="form-group">
                                @foreach($tags as $tag)
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}"> {{ $tag->tag }}</label>
                                    </div>

                                @endforeach
                            </div>



                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea id="content" class="form-control" rows='5' cols='5'  name="contents">

                                </textarea>
                            </div>

                            <button type="submit" class="btn btn-success">Create Post</button>



                        </form>
                    </div>


                </div>

@endsection
