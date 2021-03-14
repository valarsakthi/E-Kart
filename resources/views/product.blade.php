@extends('layouts.app');
@section('content_app')
<div class="container" style="padding-top: 40px">
  <h2>Master : Product</h2>
  <form action="/product" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="prod_name">Product Name:</label>
      <input type="text" class="form-control" id="prod_name" name="prod_name" style="width: 75%;" value=''>
    </div>
    <div class="form-group">
        <label for="cat_list">Category:</label>
        <select class="form-control" id="cat_id" name="cat_id" style="width: 75%;">
        <option>Select Category</option>
        @foreach ($data as $item)
          <option value={{$item->id}}>{{$item->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="prod_img">Product Image:</label>
      <input type="file" class="form-control-file border" name="prod_img" style="width: 75%;">
    </div>
    <div class="form-group">
        <label for="prod_des">Description:</label>
        <textarea class="form-control" rows="3" id="prod_des" name='prod_des' style="width: 75%;"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection
