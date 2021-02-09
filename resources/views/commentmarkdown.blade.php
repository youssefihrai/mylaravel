@component('mail::message')
quelqu'un a commenté  votre post 
@component('mail::button', ['url' => route('users.show',['user'=>$comment->user->id]) ])
{{ $comment->user->name }} 
@endcomponent
@component('mail::button', ['url' => route('Post.show',['Post'=>$comment->commentable->id])])
{{ $comment->commentable->title }}
@endcomponent
@component('mail::panel')
{{$comment->content  }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
