@extends('layouts.apps')
@section('content')


<section id="main-content">
    <section class="wrapper">
<div class="row mt">
    <div class="col-md-12">
      <div class="content-panel">
        <table class="table table-striped table-advance table-hover">

          <h4><i class="fa fa-angle-right"></i> pedagodique  Table</h4>
          <a href="{{ route('Etudiant.create')}}"
            class="btn btn-primary btn-sm">
            encadrant create
        </a>
          <hr>
          <thead>
            <tr>
              <th><i class="fa fa-bullhorn"></i> name</th>
              <th class="hidden-phone"><i class="fa fa-question-circle"></i> state</th>
              <th><i class="fa fa-bookmark"></i> email</th>
              <th> telephonne</th>

              <th><i class=" fa fa-edit"></i> Action</th>

            </tr>
          </thead>
          <tbody>

 @foreach ( $encadrantpedagogique as  $encadrantpedagogique)

            <tr>
              <td>
                <a href="basic_table.html#"> {{ $encadrantpedagogique->name  }}</a>
              </td>
              <td class="hidden-phone">  </td>

              <td><span class="label label-warning label-mini"> {{ $encadrantpedagogique->email  }}</span></td>
              <td><span class="label label-warning label-mini"> {{ $encadrantpedagogique->telephonne  }}</span></td>
              <td>
                <a href="{{ route('Encadrant.edit', ['Encadrant' => $encadrantpedagogique->id]) }}"
                    class="btn btn-primary btn-sm">
                    {{ __('Edit') }}
                </a>
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


