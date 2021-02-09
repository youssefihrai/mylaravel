@extends('layouts.apps')
@section('content')

<section id="main-content">
    <section class="wrapper">

      <!-- BASIC FORM ELELEMNTS -->
      <div class="row mt">
        <div class="col-lg-12">
          <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> soutenance</h4>
            <form class="form-horizontal style-form" method="POST"  action="{{ route('Soutenance.store') }}">
                @csrf

              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">encadrant</label>
                <div class="col-sm-10">
                        <select class="form-control" name="pedagogiqueencadrant_id">
                                @foreach ($encadrant as $encadrant )
                                <option value="{{ $encadrant->id}}"> {{ $encadrant->name  }} </option>

                                @endforeach

                        </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">jury1</label>
                <div class="col-sm-10">
                        <select class="form-control" name="jury1">
                                @foreach ($jury1 as $encadrant )
                                <option value="{{ $encadrant->id}}"> {{ $encadrant->name  }} </option>

                                @endforeach

                        </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">jury2</label>
                <div class="col-sm-10">
                        <select class="form-control" name="jury2">
                                @foreach ($jury2 as $encadrant )
                                <option value="{{ $encadrant->id}}"> {{ $encadrant->name  }} </option>

                                @endforeach

                        </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">encadrant de l'entreprise</label>
                <div class="col-sm-10">
                        <select class="form-control" name="company_encadrants_id">
                                @foreach ($company as $encadrant )
                                <option value="{{ $encadrant->id}}"> {{ $encadrant->name  }} </option>

                                @endforeach

                        </select>
                </div>
              </div>



              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">etudiant</label>
                <div class="col-sm-10">
                    <select class="form-control" name="etudiant_id">
                        @foreach ($etudiant as $etudiant )
                        <option  value="{{ $etudiant->id}}"> {{ $etudiant->name  }} </option>

                        @endforeach

                </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">classe</label>
                <div class="col-sm-10">
                    <input id="classe" type="text" class="form-control"  name="classe" required autocomplete="new-classe" >

                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">horaire</label>
                <div class="col-sm-10">
                    <input id="date" type="text" name="date" class="form-control" required autocomplete="new-classe" >

                </div>
              </div>

              <x-errors my-class="warning"> </x-errors>




                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>

            </form>
          </div>
        </div>
        <!-- col-lg-12-->
      </div>
      <!-- /row -->

@endsection
