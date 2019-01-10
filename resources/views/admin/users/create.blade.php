@extends('layouts.app')



@section('content')
    
    

    <div class="card">
        <div class="card-head">
            <div class="card-title">
                <h4>Create New User</h4>
                @include('admin.includes.errors')
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('user.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="name" placeholder="User Name" class="form-control">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email Address">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>
    
    
    @stop