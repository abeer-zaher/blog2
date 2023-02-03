@extends('layouts.app')

@section('content')

<div class="container text-center">
  <div class="row">
    <div class="col">
    <div class="card" style="width: 70rem;">
  <div class="card-body">
    <h2 class="card-title">edit post</h2>
    <a class="btn btn-success" href="{{route('posts')}}">Show my post</a>
      
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
      <form action="{{route('posts.update',['id'=>$post->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <!--<input type="hidden" name="_token" value="{{ csrf_token()}}"/>-->
  <label for="formGroupExampleInput" class="form-label">Title</label>
  <input type="text" class="form-control" name="title" value="{{$post->title}}">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Content</label>
  <input type="text" class="form-control" name="content" value="{{$post->content}}" >
</div>

<div class="form-group">
<label for="formGroupExampleInput2" class="form-label">Photo</label>
<input class="form-control" name="photo" type="file" >

</div>
<br>
<div class="form-group">
  <button class="btn btn-danger" type="submit">
   update
</button>
</div>
</form>
    </div>
  </div>
  </div>
</div>
@endsection