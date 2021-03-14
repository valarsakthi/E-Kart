@extends('layouts.app')
@section('content_app')
    
<div class="container" style="padding-top: 40px">
  <h2>Master : Category</h2>
  <form action="/category" method="POST">
      @csrf
    <div class="form-group">
      <label for="cat_name">Category Name:</label>
      <input type="text" class="form-control" id="cnm" name="cname" style="width: 75%;">
    </div>
    <div class="form-group">
        <label for="cat_des">Description:</label>
        <textarea class="form-control" rows="3" id="cat_des" name="cat_des" style="width: 75%;"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection