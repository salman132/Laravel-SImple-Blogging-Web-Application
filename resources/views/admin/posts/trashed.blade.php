@extends('layouts.app')


@section('content')


    <table class="table table-hover">
        <thead>
        <th>Image</th>
        <th>Title</th>
        <th>Editing</th>
        <th>Restoring</th>
        <th>Delete</th>
        </thead>
        <tbody>

        @if($posts->count() >0)

                @foreach($posts as $post)

                    <tr>
                        <td><img src="{{$post->featured}}" alt="Images" style="width: 130px;height: auto;"></td>
                        <td>{{$post->title}}</td>
                        <td><a href="{{$post->id}}" class="btn btn-primary">Edit</a></td>
                        <td><a href="{{route('post.restore',['id'=>$post->id ])}}" class="btn btn-info">Restore</a></td>
                        <td><a href="{{route('post.kill',['id'=>$post->id])}}" class="btn btn-danger">Delete</a></td>
                    </tr>


                @endforeach
            @else
            <tr>
                <th class="text-center" colspan="5">No trashed Post</th>
            </tr>

            @endif








        </tbody>
    </table>


@stop