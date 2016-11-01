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
                                      <input type="text" name="cityName" id="cityName" value="@if($cityName){{ $cityName }}@endif" placeholder="City Name" class="form-control">
                                      @if ($errors->has('cityName')) <p class="help-block m-b-none">{{ $errors->first('cityName') }}</p> @endif
                              </div>
                              <div class="form-group <?php  if($errors->has('country_id')){ echo 'has-error'; }?> ">
                                <label for="country_id" class="control-label">
                                    Country
                                </label>
                                    <select name="country_id" id="country_id" class="form-control">
                                        <option value="">Select a country</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}" @if($country->id == $countryId) selected @endif >{{ $country->countryName }}</option>
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
                    <table class="table table-responsive table-bordered  table-hover">
                        <thead>
                        <tr>
                            <th>City Name</th>
                            <th>Country</th>
                            <th>Description</th>
                            <th>Picture</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($cities as $city)
                                <tr>
                                    <td>{{ $city->cityName }}</td>
                                    <td>{{ $city->country->countryName }}</td>
                                    <td>{{ $city->cityDescription }}</td>
                                    <td>
                                        @if($city->cityPicture)
                                            <img src="{{ URL::to('admin/images/'.$city->cityPicture) }}" height="50" width="50" alt="" />
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ URL::to(jobPost.$city->id) }}" class="btn btn-sm btn-info">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ URL::to(jobPost.$city->id) }}" class="btn btn-sm btn-success">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @if($city->cityPicture)
                                        <a href="{{ URL::to(department.$city->cityPicture) }}" class="btn btn-sm btn-warning">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        @endif
                                        <a href="{{ URL::to(jobPost.$city->id) }}" class="btn btn-sm btn-danger" onClick="return checkDelete();">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="box-footer clearfix">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection