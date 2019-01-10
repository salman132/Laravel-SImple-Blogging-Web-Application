@extends('layouts.app')

@section('script')

    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script>
        tinymce.init({selector:'textarea'});
    </script>

    @stop



@section('content')

    @if(count($errors) > 0)


        @foreach($errors->all() as $error)

            <li class="list-group-item text-danger">
                {{$error}}
            </li>
            @endforeach


        @endif

    <div class="card">
        <div class="card-heading">
            Create New Post
        </div>
        <div class="cart-body">
            <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="title" placeholder="Title" class="form-control">
                </div>
                <div class="form-group">
                    <input type="file" name="featured"  class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="mcontent" id="mytextarea" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="category">Choose Category</label>
                    <select name="category" id="category" class="form-control">
                        @foreach($categories as $category)

                            <option value="{{$category->id}}">{{$category->name}}</option>

                            @endforeach

                    </select>
                </div>
                <div class="form-group">

                        @foreach($tags as $tag)
                        <div class="form-check">
                            <div class="checkbox">
                                <label><input type="checkbox" value="{{$tag->id}}" name="tag"> {{$tag->tag}}</label>
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