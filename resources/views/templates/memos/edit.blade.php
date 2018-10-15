@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Memo</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('memos.update', compact('memo')) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" value="{{ old('title') ?? $memo->title }}" class="form-control" id="title" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label for="contents">Contents</label>
                                <textarea name="contents" class="form-control" id="contents" rows="16">{{ old('contents') ?? $memo->contents }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-6 text-right">
                                    <a href="{{ route('home') }}" class="btn btn-success">Cancel</a>
                                </div>
                                <div class="col-6 text-left">
                                    <button type="submit" class="btn btn-warning">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
