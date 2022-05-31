@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card card-default">
                    <div class="card-header">
                        Forum Threads
                    </div>
                    <div class="card-body">
                        @foreach($threads as $thread)
                            <div class="card card-default mt-3">
                                <a class="card-header text-primary bg-white" href="{{route('threads.show', $thread->getKey())}}">
                                    <h4>{{ $thread->title }}</h4>
                                </a>
                                <div class="card-body">
                                    <h5> {{$thread->author->name}}</h5>
                                    <small>{{$thread->created_at->diffForHumans()}}</small>
                                    <p>{{ $thread->body }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
