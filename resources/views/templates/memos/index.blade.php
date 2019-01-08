@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-right">
                    <a href="{{ route('memos.create') }}" class="btn btn-primary mb-3">New</a>
                </div>
                <div class="card">
                    <div class="card-header">Memo list</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
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
                <div class="row mt-3">
                    <div class="col-12">
                        {{ $memos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
