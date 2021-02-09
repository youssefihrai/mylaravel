@extends('layouts.app')
@section('content')

<section id="main-content">
    <section class="wrapper">

      <!-- BASIC FORM ELELEMNTS -->
      <div class="row mt">
        <div class="col-lg-12">
          <div class="form-panel">

            <form class="form-horizontal style-form"  method="POST" action="{{ $action }}" enctype="multipart/form-data">

                @csrf

                <div class="form-group">
                    <label for="subject" class="col-md-4 col-form-label text-md-right">email</label>
                    <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

              <div class="form-group">

                <label for="subject" class="col-md-4 col-form-label text-md-right">subject</label>

                <div class="col-md-6">
                    <input id="subject" type="text" class="form-control" name="subject">

                </div>

              </div>

              <div class="form-group">

                <label for="subject" class="col-md-4 col-form-label text-md-right">Message</label>

                <div class="col-md-6">
                    <textarea id="w3review" name="Message"  class="form-control" rows="4" cols="50">

                    </textarea>

                </div>

              </div>
              <button  class="btn btn-warning" type="submit">send </button>
            </form>
            <x-errors my-class="warning"> </x-errors>


        </div>
        </div>
        <!-- col-lg-12-->
      </div>
      <!-- /row -->

@endsection

