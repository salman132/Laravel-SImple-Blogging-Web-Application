@extends('layouts.app')



@section('content')

    <div class="card">

        <div class="card-body">
            <div class="card-title">
                <h6>Change Settings</h6>
            </div>
            <form action="{{route('setting.update',['id'=>$setting->id])}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="site_name" placeholder="Website Name" class="form-control" value="{{$setting->site_name}}">
                </div>
                <div class="form-group">
                    <input type="text" name="email" placeholder="Email" class="form-control" value="{{$setting->email}}">
                </div>
                <div class="form-group">
                    <input type="text" name="contact_number" placeholder="Contact Number" class="form-control" value="{{$setting->contact_number}}">
                </div>
                <div class="form-group">
                    <input type="text" name="address" placeholder="Address" class="form-control" value="{{$setting->address}}">
                </div>
                <div class="form-gorup">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>

            </form>
        </div>
    </div>



    @stop