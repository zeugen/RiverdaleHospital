@extends('layouts.admin')

@section('main_content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    {{-- all sections should now be inside rows --}}
    <div class="row col-lg-12">
        <h1 class="page-header">
            CREATE POST
        </h1>
    </div>
    <div class="row">
        <div class="col-lg-7 mr-auto ml-auto">
               
            @include('partials._form_errors')
            {!! Form::open(['method'=>'POST', 'action'=>'adminPostsController@store','data-parsley-validate','id'=>'form', 'files'=>true]) !!}
                
                <div class="form-group">
                    {!!Form::label('title','Title: ')!!}
                    {!!Form::text('title',null, ['class'=>'form-control'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('category_id', 'Category: ')!!}
                    {!!Form::select('category_id',[''=>'Choose Categories'] + $categories, null, ['class'=>"form-control"])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('photo_id','Photo upload: ')!!}
                    {!!Form::file('photo_id',null, ['class'=>'form-control'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('body','Post Body: ')!!}
                    {!!Form::textarea('body', null, ['class'=>'form-control','rows'=>6])!!}
                </div>


 

                <div class="form-group">
                    {!!Form::submit('Create Post', ['class'=>'btn btn-lg btn-primary'])!!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection