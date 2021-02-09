@extends('layouts.app')
@section('content')
@auth('entreprise')
<section id="main-content">
    <section class="wrapper site-min-height">
     <br/>
      <h4>  <p>   {{ __('there is') }}:{{ $posts->count() }}   {{ __('Posts')  }}</p> </h4>
        @forelse ($posts as $post)
      <div class="row mt">
        <div class="col-lg-12">
          <!-- The file upload form used as target for the file upload widget -->

          <br>


          <div class="content-panel">
            <div class="panel-body">

              <ul>
                <ul class="nav pull-right top-menu">
                    @if($post->created_at->diffInHours() < 1)
                <x-badge type="success">{{ __('new') }}</x-badge>
             @else
                <x-badge type="dark">{{ __('old') }}</x-badge>
             @endif
             <br/>
             <br/>
             @if($post->image)


             <img src="/storage/{{$post->image->path}}"  width="90" height="80">


             @endif


                  </ul>

                <li>
                    <a href="{{ route('Post.show',['Post'=>$post->id])  }}">
                        @if($post->trashed())
                        <del>
                            {{ $post->title }}
                        </del>
                      @else
                        {{ $post->title }}
                      @endif
                    </a>
                </li>
                <li><x-tags :tags="$post->tags"></x-tags></li>
                <li>
                    {{ $post->content }}

                </li>
                    <li>
                        <p>
                            <x-updated :date="$post->created_at" :name="$post->entreprise->name" :user-id="$post->entreprise->id"></x-updated>
                            <x-updated :date="$post->updated_at">    {{ __('Updated') }} </x-updated>
                        </p>
                    </li>


                    <a href="{{ route('Post.edit', ['Post' => $post->id]) }}"
                        class="btn btn-primary btn-sm">
                        {{ __('Edit') }}
                    </a>




                    @if(!$post->deleted_at)


                        <form method="POST" class="fm-inline"
                            action="{{ route('Post.destroy', ['Post' => $post->id]) }}">
                            @csrf
                            @method('DELETE')

                            <input type="submit" value="{{ __('Delete!') }}" class="btn btn-sm btn-dark"/>
                        </form>

                    @else

                        <form method="POST" class="fm-inline"
                            action="{{ url('/post/'.$post->id.'/restore') }}">
                            @csrf
                            @method('PATCH')

                            <input type="submit" value="Restore!" class="btn btn-sm btn-success"/>
                        </form>


                        <form method="POST" class="fm-inline"
                            action="{{ url('/posts/'.$post->id.'/forcedelete') }}">
                            @csrf
                            @method('DELETE')

                            <input type="submit" value="Force delete!" class="btn btn-sm btn-danger"/>
                        </form>

                    @endif




            </ul>
            </div>
            @if($post->comments_count)
            <p>{{ $post->comments_count }} {{ __('Comments')  }}</p>
        @else
            <p>{{ __('No comment yet') }}</p>
        @endif
          </div>
          @empty
          <p>{{ __('No posts yet') }}</p>

        </div>
      </div>
      @endforelse

    </section>
    <!-- /wrapper -->
  </section>
  @endauth
@endsection
