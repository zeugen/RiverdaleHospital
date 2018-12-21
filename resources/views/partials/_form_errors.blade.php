@if (count($errors)>0)
                
<div class="alert alert-danger alert-dismissible " role="alert">
        
        <strong>Errors were found!</strong> You should check in on some of those fields below.
        <ul>
            @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
@endif