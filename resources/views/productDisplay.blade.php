@extends('layouts.app')
@section('content_app')
<style>
  /* .w-5{
    display: none;
  } */
  nav svg{
    height:20px;
  }
  </style>
<div>
  <section>
    <div class='container'>
      <div class='col-md-12'>
        <div class='card'>
          <div class='card-header'>
            <h3>Products</h3>
          </div>
          <div class='card-body'>
            <table class="table table-striped table-bordered">
              <thead>
                  <tr>
                    <th>ID</th>
                    <th>Category ID</th>
                    <th>Product</th>
                    <th>Description</th>
                    <th>Details</th>
                  </tr>
                </thead>
                <tbody>
                      @foreach ($datalist as $prod)
                      <tr>
                          <td>{{$prod->id}}</td>
                          <td>{{$prod->cid}}</td>
                          <td>{{$prod->name}}</td>
                          <td>{{$prod->description}}</td>
                          <td><a href={{'details/'.$prod->id}}>Details</a></td>
                      </tr>
                      @endforeach
                </tbody>
            </table>
            {{$datalist->links()}}
          </div>
        </div>
      </div>
    </div>
  </section>
</div>




{{-- <h3 style="text-align: center;">Products</h3><br> --}}

  {{-- <span>{{$datalist->links()}}</span> --}}
@endsection