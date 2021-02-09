@extends('layouts.apps')
@section('content')


<section id="main-content">
    <section class="wrapper">
<div class="row mt">
    <div class="col-md-12">
      <div class="content-panel">
        <table class="table table-striped table-advance table-hover">

          <h4><i class="fa fa-angle-right"></i> Students Table</h4>

          <hr>
          <thead>
            <tr>
                <th><i class="fa fa-image"></i> image</th>
                <th><i class="fa fa-bullhorn"></i> name</th>
              <th class="hidden-phone"><i class="fa fa-question-circle"></i> state</th>
              <th><i class="fa fa-bookmark"></i> typegroupe</th>
              <th> company</th>
              <th><i class=" fa fa-edit"></i> supervision company</th>
              <th><i class=" fa fa-edit"></i> supervision  pedagocical</th>
              <th> <i class="fa fa-sticky-note" aria-hidden="true"></i> Note</th>
              <th><i class=" fa fa-edit"></i> Action</th>

            </tr>
          </thead>
          <tbody>

 @foreach ( $etudiants as  $etudiant)

            <tr>
<td>
    <div class="roundedImage">
    @if($etudiant->image)


    <img src="/storage/{{$etudiant->image->path}}" style="border-radius: 50%;" width="80" height="40">
</div>

    @endif

</td>
                <td>
                <a href="basic_table.html#"> {{ $etudiant->name  }}</a>
              </td>

              <td class="hidden-phone">  {{ $etudiant->email  }} </td>
              <td >  <span class="label label-warning label-mini"> {{ $etudiant->typegroupe  }}  </span></td>
              <td><span class="label label-warning label-mini">@foreach($etudiant->encadres  as $etudiants)
                {{ $etudiants->name }}
            @endforeach</span></td>
              <td>

                <a href="{{ route('Etudiant.edit', ['Etudiant' => $etudiant->id]) }}"
                    class="btn btn-primary btn-sm">
                    {{ __('Edit') }}
                </a>
              </td>
                <td>

                    @foreach($etudiant->pegaogiqueencadrants  as $etudiants)
                    {{ $etudiants->name }}
                @endforeach
</td>
  <td><span class="label label-warning label-mini">@foreach($etudiant->encadres  as $etudiants)
    {{ $etudiants->pivot->notglobale }}
            @endforeach</span></td>

<td> @if ($etudiants->pivot->notglobale>11)
        admis
        @else
        non admis
@endif
</td>


            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /content-panel -->
    </div>
    <!-- /col-md-12 -->
  </div>
    </section>
    </section>


@endsection


