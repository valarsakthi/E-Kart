@extends('layouts.app')
@section('content_app')
<div class="container">
    <h3 style="text-align: center;">Categories</h3>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
              <th>ID</th>
              <th>Category</th>
              <th>Description</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td><a class="btn btn-primary" href={{"cat_edit/".$item['id']}}>Edit</a></td>
                    <td><a class="btn btn-danger" href={{"cat_delete/".$item->id}}>Delete</a></td>
                </tr>
                @endforeach
            </tbody>
    </table>
</div>
<div style='margin-left:500px;'><a class="btn btn-success" href="/category">Add</a></div>
@endsection
