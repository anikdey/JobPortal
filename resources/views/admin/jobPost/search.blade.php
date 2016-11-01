@extends('layouts.master')
@section('title')
Search
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::open(array('url'=>'admin/city/search-city', 'method'=>'POST', 'class'=>'form-inline', 'role'=>'form')) !!}
                              <div class="form-group <?php  if($errors->has('cityName')){ echo 'has-error'; }?> ">
                                  <label for="cityName" class="control-label">
                                      City Name
                                  </label>
                                      <input type="text" name="cityName" id="cityName" value="{{ Input::old('cityName') }}" placeholder="City Name" class="form-control">
                                      @if ($errors->has('cityName')) <p class="help-block m-b-none">{{ $errors->first('cityName') }}</p> @endif
                              </div>
                              <div class="form-group <?php  if($errors->has('country_id')){ echo 'has-error'; }?> ">
                                <label for="country_id" class="control-label">
                                    Country
                                </label>
                                    <select name="country_id" id="country_id" class="form-control">
                                        <option value="">Select a country</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->countryName }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('country_id')) <p class="help-block m-b-none">{{ $errors->first('country_id') }}</p> @endif
                              </div>
                              <div class="form-group" style="margin-top: 5px;">
                                 <button class="btn  btn-white" type="submit">Search</button>
                              </div>
                            {!! Form::close() !!}
                            <div class="ibox-tools">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="box-footer clearfix">
                        {{--{{ $countries->links() }}--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection