@extends('layouts.app')



@section('content')



    <div class="card">
        <div class="card-head">
            <div class="card-title">
                <h4>Edit Your Profile</h4>
                @include('admin.includes.errors')
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="name" placeholder="User Name" class="form-control" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email Address" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label>Upload Profile Picture</label><br>
                    <input type="file" name="avatar">

                </div>
                <div class="form-group">
                    <label>About You</label><br>
                    <textarea name="about" cols="30" rows="10" class="form-control">{{$user->profile->about}}</textarea>
                </div>
                <div class="form-group">
                    <input type="text" name="facebook" placeholder="Facebook" class="form-control" value="{{$user->profile->facebook}}">
                </div>

                <div class="form-group">
                    <input type="text" name="youtube" placeholder="YouTube" class="form-control" value="{{$user->profile->youtube}}">
                </div>





                <div class="form-group">
                    <input type="submit" value="Update Profile" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>


@stop