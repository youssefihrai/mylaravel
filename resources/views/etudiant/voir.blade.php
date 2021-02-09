@auth('etudiant')
@extends('layouts.appetudiant')
@section('content')



    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt">
          <div class="col-lg-12">
            <div class="row content-panel">
              <div class="col-md-4 profile-text mt mb centered">

                <h4>{{ Auth::guard('etudiant')->user()->matricule }}</h4>
                <h4>{{ Auth::guard('etudiant')->user()->name }}</h4>
                <div class="right-divider hidden-sm hidden-xs">
                    @foreach (Auth::guard('etudiant')->user()->pegaogiqueencadrants as  $etudiant )
                    <h5> <i class="fa fa-user-circle"></i>   name :   {{ $etudiant->name}}<h5>
                        <h5> <i class="fa fa-address-card"></i>   classe :   {{ $etudiant->pivot->classe}}<h5>
                            <h5> <i class="fa fa-calendar"></i>   date :   {{ $etudiant->pivot->horaire}}<h5>
                        @endforeach
                </div>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-2 profile-text">
                @foreach ( Auth::guard('etudiant')->user()->pegaogiqueencadrants as  $etudiant)
                <form method="POST" class="fm-inline"
                action="{{ url('/etablissment/'.$etudiant->pivot->id.'/activer1') }}"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="submit" value="présent  la  séance 1" class="btn btn-primary">
            </form>
                      <br/>
                      <form method="POST" class="fm-inline"
                      action="{{ url('/etablissment/'.$etudiant->pivot->id.'/activer2') }}"
                      enctype="multipart/form-data">
                      @csrf
                      @method('put')

                      <input type="submit" value="présent  la  séance 2"class="btn btn-primary">
                  </form>
                      <br/>

                      <form method="POST" class="fm-inline"
                      action="{{ url('/etablissment/'.$etudiant->pivot->id.'/activer3') }}"
                      enctype="multipart/form-data">
                      @csrf
                      @method('put')

                      <input type="submit" value="présent  la  séance 3" class="btn btn-primary">
                  </form>
                      <br/>

                      <form method="POST" class="fm-inline"
                      action="{{ url('/etablissment/'.$etudiant->pivot->id.'/activer4') }}"
                      enctype="multipart/form-data">
                      @csrf
                      @method('put')
                      <input type="submit" value="présent  la  séance 4" class="btn btn-primary">
                  </form>
           @endforeach
            </div>
              <!-- /col-md-4 -->
              <div class="col-md-2 centered">
                <h3>les  jury</h3>
                <div class="profile-pic">
                    @foreach ($jury1 as $etudiant )
                    <p>
                    {{ $etudiant->name }}
                  </p>
                  <p>
                    0{{ $etudiant->telephonne }}<br/> {{ $etudiant->departement }}<br/>
                    {{ $etudiant->email }}
                </p>
                  @endforeach
                </div>
              </div>
              <div class="col-md-2 centered">
                <h3>les  jury</h3>
                <div class="profile-pic">
                    @foreach ($jury2 as $etudiant )
                    <p>
                    {{ $etudiant->name }}
                  </p>
                  <p>
                    0{{ $etudiant->telephonne }}<br/> {{ $etudiant->departement }}<br/>
                    {{ $etudiant->email }}
                </p>
                  @endforeach
                </div>
              </div>
              <!-- /col-md-4 -->
            </div>
            <!-- /row -->
          </div>
          <!-- /col-lg-12 -->


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
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->

    @endsection

    @endauth
