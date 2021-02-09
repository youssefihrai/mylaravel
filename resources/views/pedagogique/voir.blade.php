@auth('pedagogiquencadrant')
@extends('layouts.application')
@section('content')
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt">

          <!-- /col-lg-12 -->
          <div class="col-lg-12 mt">
            <div class="row content-panel">

              <!-- /panel-heading -->
              <div class="panel-body">
                <div class="tab-content">
                  <div id="overview" class="tab-pane active">
                    <div class="row">
                      <div class="col-md-6">

                        <div class="detailed mt">
                          <h4> les  etudiant  encadré</h4>
                          <div class="recent-activity">
                            <div class="activity-icon bg-theme"><i class="fa fa-check"></i></div>
                            <div class="activity-panel">
                                @forelse (Auth::guard('pedagogiquencadrant')->user()->etudiants as  $etudiant )
                                <h5> <i class="fa fa-user-circle"></i>   name :   {{ $etudiant->name}}<h5>
                                    <h5> <i class="fa fa-address-card"></i>   classe :   {{ $etudiant->pivot->classe}}<h5>
                                    <h5> <i class="fa fa-calendar"></i>   date :   {{ $etudiant->pivot->horaire}}<h5>
                                        <h5> <i class="fa fa-magic"></i>   seance :   {{ $etudiant->pivot->seance1}}<h5>
                                            <h5> <i class="fa fa-magic"></i>   seance :   {{ $etudiant->pivot->seance2}}<h5>
                                                <h5> <i class="fa fa-magic"></i>   seance :   {{ $etudiant->pivot->seance3}}<h5>
                                                    <h5> <i class="fa fa-magic"></i>   seance :   {{ $etudiant->pivot->seance4}}<h5>
                     @empty
          <p>No etudiant </p>
                                                        @endforelse
                            @forelse (Auth::guard('pedagogiquencadrant')->user()->etudiant as  $etudiant )
                            <form method="post" action="{{ url('pedagogique/'.$etudiant->pivot->id.'/note') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                             <div class="form-group">
                                <input type="text" name="livrable" class="form-control" placeholder="notez le rapport"/>
                             </div>
                             <div class="form-group">
                                <input type="text" name="notepedagogique" class="form-control" placeholder="notez l'etudiant"/>
                             </div>
                             <div class="form-group">
                                <button  class="btn btn-success" type="submit">{{ __('Add') }} </button>
                             </div>
                            </form>
                            <x-errors my-class="warning"> </x-errors>
                            </div>
                            @empty
                            <p>{{ __('No posts yet') }}</p>
                            @endforelse
                          </div>
                          <!-- /recent-activity -->
                        </div>
                        <!-- /detailed -->
                        <h4>etudiants  jury</h4>
                        <div class="row centered mt mb">

                            @forelse (Auth::guard('pedagogiquencadrant')->user()->jury1 as  $etudiant )
                            <div class="activity-panel">
                            <h5>    {{ $etudiant->name }} </h5>
                            <form method="post" action="{{ url('jury1/'.$etudiant->pivot->id.'/note') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <input type="text" name="livrable" class="form-control" placeholder="notez le rapport"/>
                                 </div>
                                 <div class="form-group">
                                    <input type="text" name="notepedagogique" class="form-control" placeholder="notez l'etudiant"/>
                                 </div>
                                 <div class="form-group">
                                    <button  class="btn btn-success" type="submit">{{ __('Add') }} </button>
                                 </div>
                            </form>
                            <x-errors my-class="warning"> </x-errors>
                            </div>
                            @empty
                            <p>{{ __('No posts yet') }}</p>
                            @endforelse

                          @forelse (Auth::guard('pedagogiquencadrant')->user()->jury2 as  $etudiant )
                            <div class="activity-panel">
                            <h5>    {{ $etudiant->name }} </h5>
                            <form method="post" action="{{ url('jury2/'.$etudiant->pivot->id.'/note') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <input type="text" name="livrable" class="form-control" placeholder="notez le rapport"/>
                                 </div>
                                 <div class="form-group">
                                    <input type="text" name="notepedagogique" class="form-control" placeholder="notez l'etudiant"/>
                                 </div>
                                 <div class="form-group">
                                    <button  class="btn btn-success" type="submit">{{ __('Add') }} </button>
                                 </div>
                            </form>
                            <x-errors my-class="warning"> </x-errors>
                        </div>
                        @empty
                        <p>{{ __('No posts yet') }}</p>
                          @endforelse
                      </div>
                      <!-- /col-md-6 -->

                        <!-- /row -->

                        <!-- /row -->

                        <!-- /row -->
                      </div>
                      <!-- /col-md-6 -->
                    </div>
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
@endauth
