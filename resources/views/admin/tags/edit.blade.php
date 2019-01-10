@extends('layouts.app')





@section('content')



    <div class="card">
        <div class="text-center"><h3>Edit Tags</h3></div>

        <div class="card-body">
            <div class="card-title">Edit Tag</div>


            <form action="{{route('tag.update',['id'=>$tag->id])}}" method="post">
                {{csrf_field()}}
                <input type="text" name="tag" class="form-control" placeholder="Create New Tag" value="{{$tag->tag}}"><br>
                <input type="submit" value="Create" class="btn btn-primary text-center">
            </form>
        </div>
    </div>



    @stop