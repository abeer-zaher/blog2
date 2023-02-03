@extends('layouts.app')

@section('content')

<div class="container text-center">
  <div class="row">
    <div class="col">
    <div class="card" style="width: 70rem;">
  <div class="card-body">
    <h2 class="card-title">create tag</h2>
    <a class="btn btn-success" href="{{route('tags')}}">Show tags</a>
      
  </div>
</div>
    </div>
     
  </div>
  </div>
  <div class="container">
    <br>
  </div> 
  <div class="container">
  <div class="row">
    
    <div class="col">
    <div class="mb-3">
      <form action="{{route('tags.store')}}" method="POST" >
        @csrf
        <!--<input type="hidden" name="_token" value="{{ csrf_token()}}"/>-->
  <label for="formGroupExampleInput" class="form-label">Tag</label>
  <input type="text" class="form-control" name="tag" >
</div>
 

 
<br>
<div class="form-group">
  <button class="btn btn-danger" type="submit">
    save 
</button>
</div>
</form>
    </div>
  </div>
  </div>
</div>
@endsection