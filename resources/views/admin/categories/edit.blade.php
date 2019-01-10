@extends('layouts.app')




@section('content')

    @include('admin.includes.errors')



    <div class="panel panel-default">
        <div class="panel-heading">
            Update Category : {{$category->name}}
        </div>
        <div class="panel-body">
            <form action="{{route('category.update',['id'=> $category->id])}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="category" placeholder="Add New Category" value="{{$category->name}}" class="form-control">
                </div>

                <div class="form">

                    <input type="submit" value="Save Category" class="btn btn-success">

                </div>

            </form>
        </div>
    </div>




@stop