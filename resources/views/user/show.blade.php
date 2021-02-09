@extends('layouts.app')
@section('content')
<section id="main-content">
    <section class="wrapper site-min-height">
      <div class="row mt">
        <div class="col-lg-12">
          <div class="row content-panel">

            <!-- /col-md-4 -->
            <div class="col-md-4 profile-text">
              <h3></h3>

              <p>{{ $user->name }}</p>

              <br>
              <p><button class="btn btn-theme"><i class="fa fa-envelope"></i>

            </button></p>
            </div>
            <!-- /col-md-4 -->
            <div class="col-md-4 centered">
              <div class="profile-pic">
                <p>
                @if($user->image)
                    <img src="/storage/{{$user->image->path}}" class="img-circle" alt="">
                @endif
            </p>
                <p>


                </p>
              </div>
            </div>
            <!-- /col-md-4 -->
          </div>
          <!-- /row -->
        </div>
        <!-- /col-lg-12 -->
        <div class="col-lg-12 mt">
          <div class="row content-panel">
            <div class="panel-heading">

            </div>
            <!-- /panel-heading -->
            <div class="panel-body">
              <div class="tab-content">
                <div id="overview" class="tab-pane active">
                  <div class="row">
                    <div class="col-md-6">

                      <div class="grey-style">
                        <div class="pull-left">
                          <button class="btn btn-sm btn-theme"><i class="fa fa-camera"></i></button>
                          <button class="btn btn-sm btn-theme"><i class="fa fa-map-marker"></i></button>
                        </div>
                        <div class="pull-right">
                          <button class="btn btn-sm btn-theme03">POST</button>
                        </div>
                      </div>

                      <!-- /detailed -->
                    </div>
                    <!-- /col-md-6 -->
                    <div class="col-md-6 detailed">
                      <h4>User Stats</h4>
                      <div class="row centered mt mb">
                        <div class="col-sm-4">
                            <x-list-show :items="$user->comments"> </x-list-show>
                        </div>


                     </div>

                      <!-- /row -->
                    </div>
                    <!-- /col-md-6 -->

                  <!-- /OVERVIEW -->
                </div>
                <!-- /tab-pane -->

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
