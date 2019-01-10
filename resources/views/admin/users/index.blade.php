@extends('layouts.app')


@section('content')

 <div class="card">
     <div class="card-head">
         <h2>Users</h2>
     </div>
     <div class="card-body">
         <table class="table table-hover">
             <thead>
                 <th>Image</th>
                 <th>Name</th>
                 <th>Permission</th>
                 <th>Delete</th>

             </thead>
             <tbody>
                @if($users->count()>0)
                    
                    @foreach($users as $user)
                        
                        <tr>
                            <td><img src="{{asset($user->profile->avatar)}}" alt="Profile Picture" style="width:80px;height: auto"></td>
                            <td>{{$user->name}}</td>
                            <td>

                                @if($user->admin)

                                    <a href="{{route('remove.admin',['id'=>$user->id])}}" class="btn btn-danger" >Remove Permission</a>
                                    @else
                                    <a href="{{route('make.admin',['id'=>$user->id])}}" class="btn btn-info">Make Admin</a>

                                @endif

                            </td>
                            <td>
                                @if($user->admin)
                                    <a href="#" class="btn btn-danger disabled">Delete</a>
                                    @else
                                    <a href="{{$user->id}}" class="btn btn-danger">Delete</a>

                                @endif
                            </td>




                        </tr>
                        
                        @endforeach
                    
                    @else


                    @endif
             </tbody>
         </table>
     </div>
 </div>


@stop