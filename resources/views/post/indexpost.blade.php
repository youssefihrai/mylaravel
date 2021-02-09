@extends('layouts.appetudiant')
@section('content')
@auth('etudiant')
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
                    @if($post->trashed())
                    <del>
                        {{ $post->title }}
                    </del>
                  @else
                    {{ $post->title }}
                  @endif
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



            </ul>
            </div>


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
