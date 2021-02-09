@foreach($tags as $tag)

    <span class="badge badge-primary">
        <a  href="{{ route('post.tag',['id'=> $tag->id]) }}">{{  $tag->name }}
    </a>
    </span>

@endforeach
