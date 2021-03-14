@extends('layouts.app')
@section('content_app')
<div class="container">
    <h3 style="text-align: center;">Products</h3>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
              <th>ID</th>
              <th>Category ID</th>
              <th>Product</th>
              <th>Description</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->cid}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td><a class="btn btn-primary" href={{"prod_edit/".$item['id']}}>Edit</a></td>
                    <td><a class="btn btn-danger" href={{"prod_delete/".$item->id}}>Delete</a></td>
                </tr>
                @endforeach
            </tbody>
    </table>
</div>
<div style='margin-left:500px;'><a class="btn btn-success" href="/product">Add</a></div>
@endsection
