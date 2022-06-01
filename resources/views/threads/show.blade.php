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
                        <small>{{$thread->created_at->diffForHumans()}}</small>
                        <p>
                            {{ $thread->body }}
                        </p>
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
        @auth
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card-header">
                        Reply
                    </div>
                    <div class="card-body">
                        <form action="{{route('threads.reply', $thread->getKey())}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea name="body" id="body" class="form-control" placeholder="Have something to say?" rows="5"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Post</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <p class="fw-light text-lg-center mt-3 mb-3"><a href="{{route('login')}}">Entre para participar da conversa</a></p>
                </div>
            </div>
        @endauth
    </div>
@endsection
