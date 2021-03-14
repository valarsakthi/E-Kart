@extends('layouts.app')
   
@section('content_app')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome</div>
                <div class="card-body">
                    <pre>
                        Hello {{ Auth::user()->name}}, welcome to our E-kart Application.
                    </pre>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
