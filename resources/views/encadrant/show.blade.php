@extends('layouts.app')
@section('content')
<section id="main-content">
    <section class="wrapper site-min-height">
      <div class="row mt">
        <div class="col-lg-12">
          <div class="row content-panel">
            <div class="col-md-4 profile-text mt mb centered">
                <div class="right-divider hidden-sm hidden-xs">
                <h6>matricule</h6>
                    <h4>    <i class=" fa fa-indent"></i>
                        {{ $encadrantcompany->matricule }}</h4>
<br/>
                  <h6>adresse</h6>
                  <h4>    <i class=" fa fa-address-card"></i>
                      {{ $encadrantcompany->adresse }}</h4>

                  <br/>
                  <h6>telephonne</h6>
                  <h4>    <i class=" fa fa-phone-square"></i>
                     0{{ $encadrantcompany->telephonne }}</h4>


                </div>
              </div>
            <!-- /col-md-4 -->
            <div class="col-md-4 profile-text">

                <h3><i class=" fa fa-user-circle"></i> {{ $encadrantcompany->name }}</h3>
                <br/>
              <h6><i class=" fa fa-calendar"></i>{{ $encadrantcompany->created_at }}</h6>
              <h5> <i class=" fas fa-school"></i> matiere{{ $encadrantcompany->matiere }}</h5>
              <h4>departement :{{ $encadrantcompany->departement }}</h4>
            </div>
            <div class="col-md-4 righted">
                <div class="profile-pic">
                  @if($encadrantcompany->image)
                   <img src="/storage/{{$encadrantcompany->image->path}}" class="img-circle" alt="">
                          @endif
                </div>
              </div>
          </div>


        </div>

    </div>
    </section>

  </section>

@endsection
