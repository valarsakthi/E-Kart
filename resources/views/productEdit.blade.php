@extends('layouts.app');
@section('content_app')
<div class="container" style="padding-top: 40px">
  <h2>Master : Product</h2>
  <form action="/prod_update" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input type="hidden" class="form-control" id="id" name="id" style="width: 75%;" value={{$data->id}}>
      </div>
    <div class="form-group">
      <label for="prod_name">Product Name:</label>
      <input type="text" class="form-control" id="prod_name" name="prod_name" style="width: 75%;" value={{$data->name}}>
    </div>
     <div class="form-group">
        <label for="cat_list">Category:</label>
        <select class="form-control" id="cat_id" name="cat_id" style="width: 75%;">
        @foreach ($category as $item)
            @if($data->cid == $item->id)
                <option value={{$item->id}} selected>{{$item->name}}</option>
            @else
                <option value={{$item->id}}>{{$item->name}}</option>                
            @endif
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="prod_img">Product Image:</label>
      <img src={{asset('storage/product_img/'.$data->img_path)}}>
      <input type="file" class="form-control-file border" name="prod_img" style="width: 75%;">
    </div>
    <div class="form-group">
        <label for="prod_des">Description:</label>
        <textarea class="form-control" rows="3" id="prod_des" name='prod_des' style="width: 75%;">{{$data->description}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>

@endsection