@extends('layouts.main')
@section('title', 'Home')
@section('content')
<div class="container">asddsa
    nuevo commit lkmdsfsda
    asd
    asddasd
    asddfds
    dadsd
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
