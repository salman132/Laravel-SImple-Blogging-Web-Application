@extends('layouts.app')



@section('content')

    @if(count($errors) > 0)


        @foreach($errors->all() as $error)

            <li class="list-group-item text-danger">
                {{$error}}
            </li>
        @endforeach


    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            Update Post
        </div>
        <div class="panel-body">
            <form action="{{route('post.update',['id'=>$post->id])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="title" placeholder="Title" class="form-control" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <input type="file" name="featured"  class="form-control">
                    <img src="{{$post->featured}}" alt="{{$post->title}}" width="140px" height="auto">
                </div>
                <div class="form-group">
                    <textarea name="mcontent" id="" cols="30" rows="10" class="form-control">{{$post->content}}</textarea>
                </div>
                <div class="form-group">
                    <label for="category">Choose Category</label>
                    <select name="category" id="category" class="form-control">


                        @foreach($categories as $category)
                            <option value="{{$category->id}}"

                            @if($post->category->id == $category->id)

                                selected



                                @endif

                            >{{$category->name}}</option>

                            @endforeach

                    </select>

                </div>
                <div class="form-group">

                    @foreach($tags as $tag)
                        <div class="form-check">
                            <div class="checkbox">
                                <label><input type="checkbox" value="{{$tag->id}}" name="tags[]"


                                    @foreach($post->tags as $t)
                                        @if($tag->id == $t->id)
                                            checked

                                         @endif

                                        @endforeach

                                    > {{$tag->tag}}</label>
                            </div>

                        </div>
                    @endforeach

                </div>

                <div class="form">
                    <div class="text-center">
                        <input type="submit" value="Post" class="btn btn-success form-control">
                    </div>
                </div>

            </form>
        </div>
    </div>



@stop