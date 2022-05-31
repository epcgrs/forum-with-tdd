<div class="card card-default">
    <div class="card-body">
        <h5>{{$reply->owner->name}}</h5>
        <p>
            {{ $reply->body }}
        </p>
        <small>{{$reply->created_at->diffForHumans()}}</small>
    </div>
</div>
