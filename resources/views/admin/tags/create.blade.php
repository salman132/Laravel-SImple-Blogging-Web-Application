@extends('layouts.app')



@section('content')


    @include('admin.includes.errors')


    <div class="card">
        <div class="text-center">
            <h3>Create New Tags</h3>
        </div>
        <div class="card-body">
            <div class="card-title">Add New Tag</div>
            <form action="{{route('tag.store')}}" method="post">
                {{csrf_field()}}
                <input type="text" name="tag" class="form-control" placeholder="Create New Tag"><br>
                <input type="submit" value="Create" class="btn btn-primary text-center">
            </form>
        </div>
    </div>



    @stop