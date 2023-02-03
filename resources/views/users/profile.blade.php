 
@extends('layouts.app')
 
 <div class="container" style="padding-top: 8%;">
     <form action="{{route('profile.update')}}" method="POST">
     <input type="hidden" name="_token" value="{{ csrf_token()}}"/>
     @method('PUT')
 
 
         <div class="form-group">
             <label for="exampleFormControlInput1"> province </label>
             <input type="text" name="province" class="form-control" value="{{$user->profile->province}}">
 </div>
 
 <div class="form-group">
 <label for="exampleFormControlSelect1">  </label>
 <select class="form-control" name="">
     <option></option>
     <option></option>
 </select>
 <div class="form-group">
 <label for="exampleFormControlTextarea1"> Bio </label>
 <textarea name="bio" class="form-control" rows="3"  >
 {{ $user->profile->bio}}    
 </textarea>
 </div>
 <div class="form-group">
 <label for="exampleFormControlTextarea1"> Facbook </label>
 <textarea name="facebook" class="form-control" rows="3"  > {{ $user->profile->facebook}}  </textarea>
 </div>
 
 <div class="form-group">
    <label for="exampleFormControlInput1"> password </label>
    <input type="password" name="password" class="form-control" value=" {{ $user->password}} " >
   
 </div>
 
 <div class="form-group">
    <label for="exampleFormControlInput1"> c-password </label>
    <input type="password" name="c-password" class="form-control" >
 </div>
 
 <div class="form-group">
     <button class="btn btn-success" type="submit">update</button>
 </div>
 </form>
 </div>
 
 