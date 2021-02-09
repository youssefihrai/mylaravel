@extends('layouts.apps')
@section('content')


<section id="main-content">
    <section class="wrapper">
<div class="row mt">
    <div class="col-md-12">
      <div class="content-panel">
        <table class="table table-striped table-advance table-hover">

          <h4><i class="fa fa-angle-right"></i> Student Table</h4>
          <a href="{{ route('Etudiant.create')}}"
            class="btn btn-primary btn-sm">
          Student create
        </a>
          <hr>
          <thead>
            <tr>
                <th><i class="fa fa-image"></i> image</th>
                <th><i class="fa fa-bullhorn"></i> name</th>
              <th class="hidden-phone"><i class="fa fa-question-circle"></i> email</th>
              <th><i class="fa fa-bookmark"></i> typegroupe</th>
              <th> company</th>
              <th><i class=" fa fa-edit"></i> edit</th>
              <th><i class=" fa fa-edit"></i> delete</th>

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
                    <a href="{{ route('Etudiant.show',['Etudiant'=>$etudiant->id])  }}">{{ $etudiant->name  }}</a>
              </td>
              <td class="hidden-phone">  {{ $etudiant->email  }} </td>
              <td >  <span class="label label-warning label-mini"> {{ $etudiant->typegroupe  }}  </span></td>
              <td><span class="label label-warning label-mini">Due</span></td>
              <td>

                <a href="{{ route('Etudiant.edit', ['Etudiant' => $etudiant->id]) }}"
                    class="btn btn-primary btn-sm">
                    {{ __('Edit') }}
                </a>
              </td>
                <td>

                    @if(!$etudiant->deleted_at)
    <form method="POST" class="fm-inline"
    action="{{ route('Etudiant.destroy', ['Etudiant' => $etudiant->id]) }}"enctype="multipart/form-data">
    @csrf
    @method('DELETE')

    <input type="submit" value="{{ __('Delete!') }}" class="btn btn-sm btn-dark"/>
</form>
@else

  <form method="POST" class="fm-inline"
      action="{{ url('/etudiant/'.$etudiant->id.'/restore') }}">
      @csrf
      @method('PATCH')

      <input type="submit" value="Restore!" class="btn btn-sm btn-success"/>
  </form>
  <form method="POST" class="fm-inline"
  action="{{ url('/etudiant/'.$etudiant->id.'/forcedelete') }}">
  @csrf
  @method('DELETE')

  <input type="submit" value="Force delete!" class="btn btn-sm btn-danger"/>
</form>
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


