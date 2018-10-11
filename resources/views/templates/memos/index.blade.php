@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-right">
                    <a href="#" class="btn btn-lg btn-primary mb-3">+ Add</a>
                </div>
                <div class="card">
                    <div class="card-header">Memo list</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @foreach($memos as $memo)
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $memo->title }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        Created At: {{ $memo->created_at->format('Y/m/d') }}　Updated At: {{ $memo->updated_at->diffForHumans() }}
                                    </h6>
                                    <p class="card-text">{{ $memo->contents }}</p>
                                    <a href="{{ route('memos.show', compact('memo')) }}" class="btn btn-primary">View</a>
                                </div>
                            </div>
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
