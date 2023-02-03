 
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="jumbotron">
                <h1 class="display-4"> All Posts</h1>
                <a class="btn btn-success" href="{{route('posts.create')}}">create post</a>
</div>
</div>
<div class="row">
    @if($post->count() >0)
   
    <div class="col">
        <table class="table">
            <thead class="thead-dark">
            <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">User</th>
        <th scope="col">Photo</th>
        <th scope="col">Action</th>
 
</tr>
</thead>
<tbody>
   @foreach($post as $item)
    
   <tr>
    <th scope="row"> #</th>
   
<td>{{$item->title}}</td>
 <td>{{$item->user->name}}</td>
<td>
    <img src="{{$item->photo}}" alt="photo" class="img-thumbnail" width="100" height="100">
</td>

<td>
    
    <a href="{{route('posts.edit',['id'=> $item->id])}}"><i class="fas fa-edit"></i></a>
    
    <a href="{{route('posts.destroy',['id'=> $item->id])}}"><i class="fas fa-trash-alt"></i></a>
</td>
</tr>
@endforeach
</tbody>
</div>
@else
<div class="alert alert-danger" role="alert">
No Posts
</div>
    @endif
</div>
</div> 
 @endsection