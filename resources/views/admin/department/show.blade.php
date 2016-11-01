@extends('layouts.master')
@section('title')
Show Country
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="col-lg-10">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-lg-2">
                            <h5>Country Detail</h5>
                        </div>
                        <div class="col-lg-10">
                            <div class="ibox-tools">
                                <div class="row">
                                    <div class="col-lg-3">
                                        @if (Session::has('message'))
                                          <div class="text-success">{{ Session::get('message') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-lg-9">
                                        <a href="{{ URL::to(department) }}" class="pull-right"><span  class="label label-primary">New</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-8">
                            <table class="table table-responsive table-bordered  table-hover ">
                                <tbody>
                                    <tr>
                                        <th>Country Name</th>
                                        <td>{{ $country->countryName }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{{ $country->countryDescription }}</td>
                                    </tr>
                                    <tr>
                                        <th>Picture</th>
                                        <td>
                                            @if($country->countryPicture)
                                            <br/>
                                                <img src="{{ URL::to('admin/images/'.$country->countryPicture) }}" height="150" width="200" alt="" />
                                            @else
                                                <p>No Image</p>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection