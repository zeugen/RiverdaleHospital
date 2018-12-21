@extends('layouts.admin')

@section('main_content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    {{-- all sections should now be inside rows --}}

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">POSTS</h1>
        </div>
    </div><!--/.row-->
    <div class="row">

        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                  <tr>
               
                    <th scope="col">Post Id</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Author</th>
                    <th scope="col">Category</th>
                    
                    <th scope="col">Title</th>
                    <th scope="col">Body</th>
                    <th scope="col">Time Created</th>
                    <th scope="col">Time Edited</th>
                  </tr>
                </thead>
                <tbody>
                    @if ($posts)
                    @foreach ($posts as $post)
                    <tr>
       
                        <td>{{$post->id}}</td>   
                        <td><img height='50' src="{{$post->photo ? $post->photo->file : '/icons/attach@High.png'}} " alt="Blog photo"></td>    
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->category? $post->category->name : "Uncategorized"}}</td>
                        
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    
                          
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    </tr>
                    @endforeach
                    @endif
  
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection