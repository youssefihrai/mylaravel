<p> quelqu'un a commenté  votre post 
<a href="{{ route('Post.show',['Post'=>$comment->commentable->id]) }}">
{{ $comment->commentable->title }}
</a>
</p>
<p> ce post est créér par 
    <a href="{{ route('users.show',['user'=>$comment->user->id]) }}">
    {{ $comment->user->name }}  
    </a>
    dit
    </p>
    <p> 
{{$comment->content  }}
    </p>