@extends('layouts.app')




@section('content')

    @include('admin.includes.errors')



<div class="panel panel-default">
    <div class="panel-heading">
        Create New Category
    </div>
    <div class="panel-body">
        <form action="{{route('category.store')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" name="category" placeholder="Add New Category" class="form-control">
            </div>

            <div class="form">

                    <input type="submit" value="Save Catgory" class="btn btn-success">

            </div>

        </form>
    </div>
</div>




    @stop