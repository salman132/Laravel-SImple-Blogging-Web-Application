@extends('layouts.app')




@section('content')



    <table class="table table-hover">
        <thead>
            <th>Category Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>



        <tbody>

        @if($categories->count()>0)

            @foreach($categories as $category)

                <tr>
                    <td>
                        {{$category->name}}
                    </td>
                    <td>
                        <a href="{{route('category.edit',['id'=>$category->id])}}" class="btn btn-primary">
                            Edit
                    </td>
                    <td>
                        <a href="{{route('category.delete',['id'=>$category->id])}}" class="btn btn-danger">

                            Delete
                        </a>

                    </td>
                </tr>
            @endforeach



            @else


            <tr>
                <th colspan="5" class="text-center">There is no categories</th>
            </tr>

            @endif

        </tbody>
    </table>




    @stop