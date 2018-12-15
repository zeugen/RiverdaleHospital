@extends('layouts.admin')

@section('main_content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        {{-- all sections should now be inside rows --}}
    
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Create A New User</h1>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-7 mr-auto ml-auto">
               
                @include('partials._form_errors')
                {!! Form::open(['method'=>'POST', 'action'=>'adminUsersController@store','data-parsley-validate','id'=>'form', 'files'=>true]) !!}
                    
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
                        {!!Form::select('is_active', array(1=>'Active',0=>'Not Active'), 0, ['class'=>'form-control'])!!}
                    </div>
                        <div class="form-group">
                        {!!Form::label('file','File upload: ')!!}
                        {!!Form::file('file',null, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('password','Password: ')!!}
                        {!!Form::password('password', ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!!Form::submit('Create User', ['class'=>'btn btn-lg btn-primary'])!!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>       
@endsection
@section('scripts')
<script src="{{asset('/js/parsley.min.js')}}"></script>

@endsection

