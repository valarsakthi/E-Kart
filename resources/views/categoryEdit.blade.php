@extends('layouts.app')
@section('content_app')
    
<div class="container" style="padding-top: 40px">
  <h2>Master : Category</h2>
  <form action="/cat_update" method="POST">
      @csrf
    <div class="form-group">
        {{-- <label for="cat_id">ID:</label> --}}
        <input type="hidden" class="form-control" id="cid" name="cid" style="width: 75%;" value={{$data->id}}>
    </div>
    <div class="form-group">
      <label for="cat_name">Category Name:</label>
      <input type="text" class="form-control" id="cnm" name="cname" style="width: 75%;" value={{$data->name}}>
    </div>
    <div class="form-group">
        <label for="cat_des">Description:</label>
        <textarea class="form-control" rows="3" id="cat_des" name="cat_des" style="width: 75%;">{{$data->description}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
@endsection