@extends('layouts.apps')
@section('content')
<section id="main-content">
    <section class="wrapper">
<div class="row mt">
    <div class="col-md-12">
      <div class="content-panel">
        <table class="table table-striped table-advance table-hover">

          <h4><i class="fa fa-angle-right"></i> Company Table</h4>
          <a href="{{ route('CompanyEncadrant.create')}}"
            class="btn btn-primary btn-sm">
            encadrant create
        </a>
          <hr>
          <thead>
            <tr>
                <th><i class="fa fa-id-card"></i> matricule</th>
              <th><i class="fa fa-font-awesome"></i> name</th>

              <th><i class="fa fa-envelope"></i> email</th>
              <th><i class="fa fa-phone"></i> phonne</th>

              <th><i class=" fa fa-edit"></i> edit</th>
              <th><i class=" fa fa-trash"></i> Supprimer</th>
            </tr>
          </thead>
          <tbody>

 @foreach ( $encadrantcompany as  $encadrantcompany)
            <tr>
              <td>
                <a href="basic_table.html#"> {{ $encadrantcompany->matricule  }}</a>
              </td>

              <td><span class="label label-danger label-mini"> {{ $encadrantcompany->name  }}</span></td>

              <td><span class="label label-warning label-mini"> {{ $encadrantcompany->email  }}</span></td>

              <td><span class="label label-info label-mini"> {{ $encadrantcompany->telephonne  }}</span></td>
              <td>
                <a href="{{ route('CompanyEncadrant.edit', ['CompanyEncadrant' => $encadrantcompany->id]) }}"
                    class="btn btn-primary btn-sm">
                    {{ __('Edit') }}
                </a>
              </td>
                <td>
    <form method="POST" class="fm-inline"
    action="{{ route('CompanyEncadrant.destroy', ['CompanyEncadrant' => $encadrantcompany->id]) }}">
    @csrf
    @method('DELETE')

    <input type="submit" value="{{ __('Delete!') }}" class="btn btn-sm btn-dark"/>
</form>
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


