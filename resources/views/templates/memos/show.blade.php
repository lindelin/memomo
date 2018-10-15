@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-4">
                        <div class="text-left">
                            <a href="{{ route('home') }}" class="btn btn-success">< Back</a>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="text-right mb-3">
                            <a href="{{ route('memos.edit', compact('memo')) }}" class="btn btn-warning">Edit</a>
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
