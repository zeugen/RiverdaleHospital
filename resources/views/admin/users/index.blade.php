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
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection