<div>
    <ul>
        @foreach($leaveMsgs as $v)
            <li>{{$v->user->name}}--{{$v->title}}--{{ $v->content }}</li>
        @endforeach
    </ul>

    {{ $leaveMsgs->links() }}
</div>
