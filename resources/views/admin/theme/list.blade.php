
@if(Session::has('version'))
    @extends('layouts.'.Session::get('version').'.adminpages')
@endif
@section('content')
   
    <main role="main" class="col-md-11 ml-sm-auto col-lg-11 pt-3 px-4">

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 border-bottom">
        <h2>Apply The Theme</h2>
      </div>
      <div class="container-fluid" id="theme-section">
        <div class="row">
          <form class="form-inline" id="theme-form" action="javascript:void(0)">
            {{ csrf_field() }}
            <div class="col-sm-12 form-group">
              <div class="col-sm-6">
                <div class="card card-section {{Session::get('version') == 'v1' ? 'card-bg-color-1' : 'card-bg-color-2'}}" id="card-1">
                  <img src="{{ URL::to('/') }}/img/theme1.png" alt="Theme 1"  class="card-img-top img-thumbnail img-check">
                  <div class="card-body text-center">
                    <div class="form-check">
                      <label class="toggle themeLabel" >
                        <input type="radio" name="themeValue" value="v1" {{Session::get('version') == 'v1' ? 'checked' : ''}}> <span class="label-text">SPECIAL</span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="card card-section {{Session::get('version') == 'v2' ? 'card-bg-color-1' : 'card-bg-color-2'}}" id="card-2">
                  <img src="{{ URL::to('/') }}/img/theme2.png" alt="Theme 2"  class="card-img-top img-thumbnail img-check">
                  <div class="card-body text-center">
                    <div class="frb-group">
                      <div class="form-check">
                        <label class="toggle themeLabel">
                          <input type="radio" name="themeValue" value="v2" {{Session::get('version') == 'v2' ? 'checked' : ''}}> <span class="label-text">ELEGANT</span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </main>
  </div>
</div>
@endsection

