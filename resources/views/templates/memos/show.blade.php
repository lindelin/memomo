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
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger ml-3" data-toggle="modal" data-target="#exampleModal">
                                Delete
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-left">
                                            This memo will be deleted，are you sure?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('memos.destroy', compact('memo')) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
