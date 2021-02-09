@extends('layouts.apps')
@section('content')
<section id="main-content">
    <section class="wrapper">
<div class="row mt">
    <div class="col-md-12">
      <div class="content-panel">
        <table class="table table-striped table-advance table-hover">

          <h4>Pedagogiqueencadrant Table</h4>
          <a href="{{ route('Pedagogiqueencadrant.create')}}"
            class="btn btn-primary btn-sm">
            encadrant create
        </a>
          <hr>
          <thead>
            <tr>
                <th><i class="fa fa-bullhorn"></i> image</th>
                <th><i class="fa fa-bullhorn"></i> name</th>
              <th class="hidden-phone"><i class="fa fa-envelope"></i> email</th>
              <th><i class="fa fa-graduation-cap"></i> matiere</th>
              <th><i class="fa fa-phone"></i> telephonne</th>
              <th> departement</th>

              <th><i class=" fa fa-edit"></i> edit</th>
              <th><i class=" fa fa-trash"></i> delete</th>
            </tr>
          </thead>
          <tbody>

 @foreach ( $encadrantcompany as  $encadrantcompany)
            <tr>
                <td>
                    <div class="roundedImage">
                    @if($encadrantcompany->image)
                    <img src="/storage/{{$encadrantcompany->image->path}}" style="border-radius: 30%;" width="80" height="40">
                </div>
                    @endif
                </td>
                <td>
                    <a href="{{ route('Pedagogiqueencadrant.show',['Pedagogiqueencadrant'=>$encadrantcompany->id])  }}"> {{ $encadrantcompany->name  }}</a>
              </td>
              <td class="hidden-phone"> {{ $encadrantcompany->email  }} </td>


              <td><span class="label label-warning label-mini"> {{ $encadrantcompany->matiere  }}</span></td>

              <td><span class="label label-warning label-mini"> {{ $encadrantcompany->telephonne  }}</span></td>
              <td class="hidden-phone"> {{ $encadrantcompany->departement  }} </td>
              <td>
                <a href="{{ route('Pedagogiqueencadrant.edit', ['Pedagogiqueencadrant' => $encadrantcompany->id]) }}"
                    class="btn btn-primary btn-sm">
                    {{ __('Edit') }}
                </a>
              </td>
                <td>
                    @if(!$encadrantcompany->deleted_at)
                    <form method="POST" class="fm-inline"
    action="{{ route('Pedagogiqueencadrant.destroy', ['Pedagogiqueencadrant' => $encadrantcompany->id]) }}"enctype="multipart/form-data">
    @csrf
    @method('DELETE')

    <input type="submit" value="{{ __('Delete!') }}" class="btn btn-sm btn-dark"/>
</form>
@else

  <form method="POST" class="fm-inline"
      action="{{ url('/encadrantpedagagogiue/'.$encadrantcompany->id.'/restore') }}">
      @csrf
      @method('PATCH')

      <input type="submit" value="Restore!" class="btn btn-sm btn-success"/>
  </form>
  <form method="POST" class="fm-inline"
  action="{{ url('/encadrantpedagagogiue/'.$encadrantcompany->id.'/forcedelete') }}">
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


