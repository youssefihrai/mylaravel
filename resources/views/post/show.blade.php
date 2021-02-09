@extends('layouts.app')
@section('content')
<section id="main-content">
    <section class="wrapper site-min-height">
      <div class="row mt">
        <div class="col-lg-12">
          <div class="row content-panel">

            <!-- /col-md-4 -->
            <div class="col-md-4 profile-text">
              <h3>{{ $post->title }}</h3>
              <h6>{{ $post->created_at }}</h6>
              <p> {{ $post->content }}</p>
              <p>
                @if($post->active)
                    enabled
               @else
               disabled
               @endif
                </p>
              <br>
              <p>
                <a href="{{ route('Post.edit', ['Post' => $post->id]) }}"
                    class="btn btn-primary btn-sm">
                    {{ __('Edit') }}
                </a>
            </p>
            </div>
            <!-- /col-md-4 -->
            <div class="col-md-4 centered">
              <div class="profile-pic">
                @if($post->image)
                 <img src="/storage/{{$post->image->path}}" class="img-circle" alt="">
                        @endif
              </div>
            </div>
            <!-- /col-md-4 -->
          </div>
          <!-- /row -->
        </div>
        <!-- /col-lg-12 -->
        <div class="col-lg-12 mt">
          <div class="row content-panel">

            <!-- /panel-heading -->
            <div class="panel-body">
              <div class="tab-content">
                <div id="overview" class="tab-pane active">
                  <div class="row">
                    <div class="col-md-6">
                        <x-comment-form :action="route('posts.comments.store',['post'=>$post->id]) ">

                        </x-comment-form>
                      <div class="grey-style">
                        <div class="pull-left">
                          <button class="btn btn-sm btn-theme"><i class="fa fa-camera"></i></button>
                          <button class="btn btn-sm btn-theme"><i class="fa fa-map-marker"></i></button>
                        </div>
                        <div class="pull-right">
                          <button class="btn btn-sm btn-theme03">POST</button>
                        </div>
                      </div>
                      <x-list-show :items="$post->comments"> </x-list-show>
                      <!-- /detailed -->
                    </div>
                    <!-- /col-md-6 -->
                    @include('layouts.sidebar')
                    <!-- /col-md-6 -->
                  </div>
                  <!-- /OVERVIEW -->
                </div>
                <!-- /tab-pane -->
                <div id="contact" class="tab-pane">
                  <div class="row">
                    <div class="col-md-6">
                      <div id="map"></div>
                    </div>

                <!-- /tab-pane -->
                <div id="edit" class="tab-pane">
                  <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 detailed">
                      <h4 class="mb">Personal Information</h4>
                      <form role="form" class="form-horizontal">
                        <div class="form-group">
                          <label class="col-lg-2 control-label"> Avatar</label>
                          <div class="col-lg-6">
                            <input type="file" id="exampleInputFile" class="file-pos">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Company</label>
                          <div class="col-lg-6">
                            <input type="text" placeholder=" " id="c-name" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Lives In</label>
                          <div class="col-lg-6">
                            <input type="text" placeholder=" " id="lives-in" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Country</label>
                          <div class="col-lg-6">
                            <input type="text" placeholder=" " id="country" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Description</label>
                          <div class="col-lg-10">
                            <textarea rows="10" cols="30" class="form-control" id="" name=""></textarea>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="col-lg-8 col-lg-offset-2 detailed mt">
                      <h4 class="mb">Contact Information</h4>
                      <form role="form" class="form-horizontal">
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Address 1</label>
                          <div class="col-lg-6">
                            <input type="text" placeholder=" " id="addr1" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Address 2</label>
                          <div class="col-lg-6">
                            <input type="text" placeholder=" " id="addr2" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Phone</label>
                          <div class="col-lg-6">
                            <input type="text" placeholder=" " id="phone" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Cell</label>
                          <div class="col-lg-6">
                            <input type="text" placeholder=" " id="cell" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Email</label>
                          <div class="col-lg-6">
                            <input type="text" placeholder=" " id="email" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Skype</label>
                          <div class="col-lg-6">
                            <input type="text" placeholder=" " id="skype" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-theme" type="submit">Save</button>
                            <button class="btn btn-theme04" type="button">Cancel</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /col-lg-8 -->
                  </div>
                  <!-- /row -->
                </div>
                <!-- /tab-pane -->
              </div>
              <!-- /tab-content -->
            </div>
            <!-- /panel-body -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </section>
    <!-- /wrapper -->
  </section>

@endsection
