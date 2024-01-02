@extends('layouts.app')
   
@section('content')
<div class="container">
    <a href="/notifications">Send Message</a>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    You are Admin.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
