@extends('layouts.admin')

@section('main_content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        {{-- all sections should now be inside rows --}}
    
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit User</h1>
            <img src="{{$user->photo? $user->photo->file:'/icons/user@High.png'}}" alt="profile picture" class="img-fluid float-right img-thumbnail img-rounded" style="max-width:250px;">
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-7 mr-auto ml-auto">
               
                @include('partials._form_errors')
                {!! Form::model($user,['method'=>'PATCH', 'action'=>['adminUsersController@update',$user->id], 'files'=>true]) !!}
                    
                    <div class="form-group">
                        {!!Form::label('name','User Name: ')!!}
                        {!!Form::text('name',null, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('email','Email: ')!!}
                        {!!Form::email('email', null, ['class'=>'form-control','type'=>'email'])!!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('role_id','Role Id: ')!!}
                        {!!Form::select('role_id',[''=>'Choose Options']+$roles, null, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('is_active','Status:')!!}
                        {!!Form::select('is_active', array(1=>'Active',0=>'Not Active'), null, ['class'=>'form-control'])!!}
                    </div>
                        <div class="form-group">
                        {!!Form::label('photo_id','File upload: ')!!}
                        {!!Form::file('photo_id',null, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('password','Password: ')!!}
                        {!!Form::password('password', ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!!Form::submit('Create User', ['class'=>'btn btn-lg btn-primary'])!!}
                        {!! Form::close() !!}
                        {{Form::open(['method'=>'DELETE', 'action'=>['adminUsersController@destroy',$user->id], 'class'=>'pull-right'])}}

                        {{Form::submit('Delete User',['class'=>'btn btn-lg btn-danger'])}}

                        {{Form::close()}}
                    </div>


            </div>
        </div>
    </div>       
@endsection
@section('scripts')
<script src="{{asset('/js/parsley.min.js')}}"></script>

@endsection

