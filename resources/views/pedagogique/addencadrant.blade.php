@extends('layouts.apps')
@section('content')

<section id="main-content">
    <section class="wrapper">

      <!-- BASIC FORM ELELEMNTS -->
      <div class="row mt">
        <div class="col-lg-12">
          <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> {{ __('Register') }}</h4>
            <form class="form-horizontal style-form" method="POST"  action="{{ route('Pedagogiqueencadrant.store') }}"enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">matricule</label>
                    <div class="col-sm-10">
                        <input id="matricule" type="text" class="form-control" name="matricule" required autocomplete="new-matricule">

                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">departement</label>
                    <div class="col-sm-10">
                        <select name="departement" id="departement">
                            <option value="informatique">informatique</option>
                            <option value="civile">genie civile</option>
                            <option value="industrielle">genie industrielle</option>
                    </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">grade</label>
                    <div class="col-sm-10">
                        <select name="grade" id="grade">
                            <option value="informatique">permanant</option>
                            <option value="civile">vacataire</option>

                    </select>
                    </div>
                  </div>

                <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">{{ __('Name') }}</label>
                <div class="col-sm-10">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">{{ __('E-Mail Address') }}</label>
                <div class="col-sm-10">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">matiere</label>
                <div class="col-sm-10">
                    <input id="matiere" type="text" class="form-control" name="matiere"  required autocomplete="email">


                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">telephonne</label>
                <div class="col-sm-10">
                    <input id="telephonne" type="text" class="form-control" name="telephonne" required autocomplete="new-matricule">

                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">picture</label>
                <div class="col-sm-10">
                <input type="file" name="picture" id="picture" class="form-control-file">
            </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">sexe</label>
                <div class="col-sm-10">
                    <div>
                        <input type="radio" id="sexe" name="sexe" value="Home">
                        <label for="Home">man</label>
                      </div>
                      <div>
                        <input type="radio" id="sexe" name="sexe" value="femme">
                        <label for="femme">woman</label>
                      </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">date naissance</label>
                <div class="col-sm-10">
                    <input id="date_naissance" type="date" class="form-control" name="date_naissance" >

                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Adresse</label>
                <div class="col-sm-10">

               <textarea  id="adresse" type="text" class="form-control" name="adresse" > </textarea>

                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">{{ __('Password') }}</label>
                <div class="col-sm-10"><input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">{{ __('Confirm Password') }}</label>
                <div class="col-sm-10">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">etablissment</label>
                <div class="col-sm-10">
                    <input id="matricule" type="text" class="form-control" required autocomplete="new-matricule" value="{{ Auth::guard('etablissement')->user()->name }}"  disabled>

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
