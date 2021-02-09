@extends('layouts.app')
@section('content')

<section id="main-content">
    <section class="wrapper">

      <!-- BASIC FORM ELELEMNTS -->
      <div class="row mt">
        <div class="col-lg-12">
          <div class="form-panel">

            <form class="form-horizontal style-form"  method="POST"  action="{{ route('CompanyEncadrant.update',['CompanyEncadrant'=>$encadrantcompany->id]) }}" enctype="multipart/form-data">

                @csrf
                @method('put')

              <div class="form-group">
                <label class="col-sm-1 col-sm-1 control-label"></label>
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="title">your name</label><input  class="form-control"type="text"name="name" id="name" value="{{ old('name',$encadrantcompany->name) }}"></div>
                        <div class="form-group">
                            <label for="content">your mail </label>
                            <input  class="form-control" type="text" name="email" id="email"value="{{ old('email',$encadrantcompany->email) }}" >
                        </div>

                        <div class="form-group">
                            <label for="content">your matricule </label>
                            <input  class="form-control" type="text" name="matricule" id="matricule"value="{{ old('matricule',$encadrantcompany->matricule ) }}" >
                        </div>

                        <div class="form-group">
                            <label for="content">your adresse </label>
                            <input  class="form-control" type="text" name="adresse" id="adresse"value="{{ old('adresse',$encadrantcompany->adresse) }}" >
                        </div>



                </div>
              </div>
              <button  class="btn btn-warning" type="submit">Update </button>
            </form>
            <x-errors my-class="warning"> </x-errors>


        </div>
        </div>
        <!-- col-lg-12-->
      </div>
      <!-- /row -->

@endsection
