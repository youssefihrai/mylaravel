@extends('layouts.app')
@section('content')

<section id="main-content">
    <section class="wrapper">

      <!-- BASIC FORM ELELEMNTS -->
      <div class="row mt">
        <div class="col-lg-12">
          <div class="form-panel">

            <form class="form-horizontal style-form"  method="POST"  action="{{ route('Post.store') }}" enctype="multipart/form-data">


              <div class="form-group">
                <label class="col-sm-1 col-sm-1 control-label"></label>
                <div class="col-sm-8">
                    @csrf
                    @include('post.form')
                </div>
              </div>
              <button  class="btn btn-success" type="submit">{{ __('Add') }} </button>

            </form>
            <x-errors my-class="warning"> </x-errors>


        </div>
        </div>
        <!-- col-lg-12-->
      </div>
      <!-- /row -->

@endsection
