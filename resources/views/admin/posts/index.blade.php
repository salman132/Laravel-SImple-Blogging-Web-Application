@extends('layouts.app')


@section('content')


    <table class="table table-hover">
        <thead>
            <th>Image</th>
            <th>Title</th>
            <th>Editing</th>
            <th>Trash</th>
        </thead>
        <tbody>

        @if($posts->count() > 0)

            @foreach($posts as $post)

                <tr>
                    <td><img src="{{$post->featured}}" alt="Images" style="width: 130px;height: auto;"></td>
                    <td>{{$post->title}}</td>
                    <td><a href="{{route('edit.post',['id'=>$post->id])}}" class="btn btn-primary">Edit</a></td>
                    <td><a href="{{route('post.delete',['id'=>$post->id ])}}" class="btn btn-danger">Trash</a></td>
                </tr>


            @endforeach




            @else

            <tr>
                <th colspan="5" class="text-center">There Is No post</th>
            </tr>

            @endif

        </tbody>
    </table>


    @stop