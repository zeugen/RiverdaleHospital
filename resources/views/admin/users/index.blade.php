@extends('layouts.admin')

@section('main_content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    {{-- all sections should now be inside rows --}}

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
      @if (Session::has('deleted_user'))
          <div class="col-md-12">
            <div class="alert alert-success alert-dismissible " role="alert">
        
              <strong>Success!</strong> {{session('deleted_user')}}
            
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
      @endif
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                  <th scope="col">Photo</th>
                    <th scope="col">Firstname</th>
                    
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Active</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                  </tr>
                </thead>
                <tbody>
                    @if ($users)
                    @foreach ($users as $user)
                    <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td><img height='50' src="{{$user->photo ? $user->photo->file : '/icons/user@High.png'}}" alt="" ></td>
                    <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
                            
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->is_active == 1 ?"active":'Not Active'}}</td>
                          
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                    </tr>
                    @endforeach
                    @endif
  
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection