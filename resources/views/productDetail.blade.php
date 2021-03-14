@extends('layouts.app')
@section('content_app')
<style>
table, tr{
    border:3px solid black;
}
</style>
<div class='container' style='padding-top: 100px;'>
<table class="table table-bordered">
    <tr>
      <th>Product Name:</th>
      <td>{{$proddata->name}}</td>
    </tr>
    <tr>
        <th>Category:</th>
        <td>{{$catlist->name}}</td>
      </tr>
    <tr>
        <th>Image:</th>
        <td><img src={{asset('storage/product_img/'.$proddata->img_path)}}></td>
      </tr>
    <tr>
      <th>Description:</th>
      <td>{{$proddata->description}}</td>
    </tr>
  </table>  
  <a href={{'/enquiry'.'/'.$proddata->id}} class="btn btn-primary btn-lg">Enquiry</a>
</div>
@endsection
