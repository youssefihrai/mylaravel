<p> quelqu'un a commenté  votre post 
<a href="{{ route('posts.show',['post'=>$comment->commentable->id]) }}">
{{ $comment->commentable->title }}
</a>
</p>
<p> ce post est créér par 
    <a href="{{ route('user.show',['user'=>$comment->user->id]) }}">
    {{ $comment->user->name }}  dit
    </a>
    </p>
    <p> 
{{$comment->content  }}
    </p>