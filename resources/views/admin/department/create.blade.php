@extends('layouts.master')
@section('title')
Add New Department
@endsection
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Add New Department</h5>
            </div>
            <div class="ibox-content">
                {!! Form::open(array('url'=>'admin/department/add-new-department', 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data', 'role'=>'form')) !!}
                    <div class="form-group <?php  if($errors->has('departmentName')){ echo 'has-error'; }?> ">
                        <label for="departmentName" class="col-lg-3 control-label">
                            Department Name
                        </label>
                        <div class="col-lg-9">
                            <input type="text" name="departmentName" id="countryName" value="{{ Input::old('departmentName') }}" placeholder="Department Name" class="form-control">
                            @if ($errors->has('departmentName')) <p class="help-block m-b-none">{{ $errors->first('departmentName') }}</p> @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <button class="btn btn-sm btn-white" type="submit">Save Department</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection