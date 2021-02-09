@extends('layouts.apps')
@section('content')
<section id="main-content">
    <section class="wrapper site-min-height">
      <div class="row mt">
        <div class="col-lg-12">
          <div class="row content-panel">
            <div class="col-md-4 profile-text mt mb centered">
                <div class="right-divider hidden-sm hidden-xs">
                    <h6>mtricule</h6>
                    <h4>{{ $etudiant->matricule }}</h4>
<br/>
                  <h6>adresse</h6>
                  <h4>{{ $etudiant->adresse }}</h4>

                </div>
              </div>
            <!-- /col-md-4 -->
            <div class="col-md-4 profile-text">
                <h3>{{ $etudiant->mtricule }}</h3>
                <h3>{{ $etudiant->name }}</h3>
              <h6>{{ $etudiant->created_at }}</h6>
              <h3>{{ $etudiant->mtricule }}</h3>
            </div>
            <div class="col-md-4 righted">
                <div class="profile-pic">
                  @if($etudiant->image)
                   <img src="/storage/{{$etudiant->image->path}}" class="img-circle" alt="">
                          @endif
                </div>
              </div>
          </div>


        </div>

    </div>
    </section>

  </section>

@endsection
