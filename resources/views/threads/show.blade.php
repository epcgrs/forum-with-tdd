@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card card-default">
                    <div class="card-header">
                        {{ $thread->title }}
                    </div>
                    <div class="card-body">
                        <h5> {{$thread->author->name}}</h5>
                        <p>
                            {{ $thread->body }}
                        </p>
                        <small>{{$thread->created_at->diffForHumans()}}</small>
                    </div>
                </div>
            </div>
        </div>

        @if($thread->replies)
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card-header">
                        Replies
                    </div>
                    @foreach( $thread->replies as $reply )
                       @include('threads.reply')
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
