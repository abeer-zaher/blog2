 
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="jumbotron">
                <h1 class="display-4"> All Tags</h1>
                <a class="btn btn-success" href="{{route('tags.create')}}">create tag</a>
</div>
</div>
<div class="row">
    @if($tag->count() >0)
   
    <div class="col">
        <table class="table">
            <thead class="thead-dark">
            <tr>
        <th scope="col">#</th>
        <th scope="col">Tag</th>
      
 
</tr>
</thead>
<tbody>
   @foreach($tag as $item)
    
   <tr>
    <th scope="row"> #</th>
   
<td>{{$item->tag}}</td>
  
<td>
    
    <a href="{{route('tags.edit',['id'=> $item->id])}}"><i class="fas fa-edit"></i></a>
    
    <a href="{{route('tags.destroy',['id'=> $item->id])}}"><i class="fas fa-trash-alt"></i></a>
</td>
</tr>
@endforeach
</tbody>
</div>
@else
<div class="alert alert-danger" role="alert">
No Tags
</div>
    @endif
</div>
</div> 
 @endsection