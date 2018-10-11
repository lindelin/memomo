@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-4">
                        <div class="text-left">
                            <a href="{{ route('home') }}" class="btn btn-success">< Back</a>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="text-right mb-3">
                            <button class="btn btn-warning">Edit</button>
                            <button class="btn btn-danger ml-3">Delete</button>
                        </div>
                    </div>
                </div>
                <div class="jumbotron">
                    <h1 class="display-4" style="font-size: 40px">{{ $memo->title }}</h1>
                    <p>Created At: {{ $memo->created_at->format('Y/m/d') }}　Updated At: {{ $memo->updated_at->diffForHumans() }}</p>
                    <hr class="my-4">
                    <p>{{ $memo->contents }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
