@extends('layouts.application')
@section('content')
<section id="main-content">
    <section class="wrapper site-min-height">
      <div class="row mt">
          Espace  encdrant  company
        <div class="col-lg-12">
          <div class="row content-panel">
            <div class="col-md-4 profile-text mt mb centered">
                <div class="right-divider hidden-sm hidden-xs">

                    <h6>matricule</h6>
                @if(Auth::guard('encadrant')->user())
                    <h4>{{ Auth::guard('encadrant')->user()->matricule }}</h4>
<br/>

                  <h4>{{ Auth::guard('encadrant')->user()->name }}</h4>


                  <h6>ton   stagiaire </h6>
                  <div class="recent-activity">
                    <div class="activity-panel">
                        @foreach (Auth::guard('encadrant')->user()->etudiants as  $etudiant )
                        <h5> <i class="fa fa-user-circle"></i>   name :   {{ $etudiant->name}}<h5>
                        <h5> <i class="fa fa-address-card"></i>   classe :   {{ $etudiant->pivot->classe}}<h5>
                        <h5> <i class="fa fa-calendar"></i>   date :   {{ $etudiant->pivot->date}}<h5>
                            @if( $etudiant->pivot->livrable!=0 &&  $etudiant->pivot->noteencadrant!=0  )
                            <form method="post" action="{{ url('/encadrant/'.$etudiant->pivot->id.'/note') }}"
                                enctype="multipart/form-data" hidden>
                                @csrf
                                @method('put')
                                <div class="form-group">
                                <input type="text" name="notepedagogique" class="form-control"  placeholder="note eleve"/>
                                </div>
                                <div class="form-group">
                                <input type="text" name="livrable" class="form-control"   placeholder="note livrable"/>
                                </div>
                                <button  class="btn btn-success" type="submit">{{ __('Add') }} </button>

                            </form>
                            @else
                            <form method="post" action="{{ url('/encadrant/'.$etudiant->pivot->id.'/note') }}"
                                enctype="multipart/form-data" >
                                @csrf
                                @method('put')
                                <div class="form-group">
                                <input type="text" name="notepedagogique" class="form-control"  placeholder="note eleve"/>
                                </div>
                                <div class="form-group">
                                <input type="text" name="livrable" class="form-control"   placeholder="note livrable"/>
                                </div>
                                <button  class="btn btn-success" type="submit">{{ __('Add') }} </button>

                            </form>
                            <x-errors my-class="warning"> </x-errors>


                             @endif
                            @endforeach
                        </div>
               @endif
                    </div>

                </div>
              </div>
            <!-- /col-md-4 -->
            <div class="col-md-4 profile-text">

            </div>
            <div class="col-md-4 righted">
                <div class="profile-pic">


                </div>
              </div>
          </div>


        </div>

    </div>
    </section>

  </section>

@endsection
