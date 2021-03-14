@extends('layouts.app')
@section('content_app')
<div class="container" style="padding-top: 40px">
  <h2>User Detail</h2>
    @if (count($errors) > 0)
    <div class='alert alert-danger' style="width:50%;">
        <button type='button' class='close' data-dismiss='alert'>x</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>   
            @endforeach
        </ul>
    </div>
    @endif
  <form action="/enquiry/sendmail" method="POST">
    @csrf
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name" style="width: 75%;" value=''>
    </div>
    <div class="form-group">
        <label for="mobno">Contact No:</label>
        <input type="text" class="form-control" id="mobno" name="mobno" style="width: 75%;" value=''>
    </div>
    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" class="form-control" id="email" name="email" style="width: 75%;" value=''>
    </div>
    <div class="form-group">
        <label for="query">Message:</label>
        <textarea class="form-control" rows="5" id="message" name='message' style="width: 75%;"></textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection
