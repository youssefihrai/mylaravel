@extends('layouts.app')
@section('content')
<section id="main-content">
    <section class="wrapper">
      <div class="row mt">
        <div class="col-lg-10 mt">
            <div class="row content-panel">
              <div class="panel-heading">
                <h4 class="mb">Personal Information</h4>
                <form role="form" class="form-horizontal">
                  <div class="form-group">
                    <label class="col-lg-2 control-label"> Select a difference Avatar</label>
                    <div class="col-lg-6">
                      <input type="file" id="exampleInputFile"  name="avatar" id="avatar" class="file-pos">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">language</label>
                    <div class="col-lg-6">
                        <select name="language" id="language" class="form-control">
                            @foreach (App\Entreprise::language as $lang =>$label )
                            <option value="{{$lang }}" {{ $user->language===$lang ? 'selected' : '' }}> {{ $label }}</option>
                            @endforeach

                           </select>
                    </div>
                  </div>

    <button class="btn btn-warning" type="submit">Modifier</button>

                </form>
              </div>
              </div>


          <!-- /row -->
        </div>



      </div>
      <!-- /container -->
    </section>
    <!-- /wrapper -->
  </section>

@endsection
