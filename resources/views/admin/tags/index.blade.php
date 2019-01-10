@extends('layouts.app')

@section('content')


    <table class="table table-hover">
        <thead>
        <tr>
            <th>Tag Name</th>
            <th>Editing</th>
            <th>Deleting</th>
        </tr>
        </thead>
        <tbody>
            @if($tags->count() > 0)


                @foreach($tags as $tag)
                    <tr>

                        <td>{{$tag->tag}}</td>
                        <td><a href="{{route('tag.edit',['id'=>$tag->id])}}" class="btn btn-info">Edit</a></td>
                        <td><a href="{{route('tag.delete',['id'=>$tag->id])}}" class="btn btn-danger">Delete</a></td>

                    </tr>



                @endforeach


                @else

                <td colspan="5" class="text-center">No Tgas Found</td>



            @endif
        </tbody>
    </table>


    @stop