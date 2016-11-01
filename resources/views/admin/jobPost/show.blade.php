@extends('layouts.master')
@section('title')
Show Job
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="col-lg-10">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-lg-2">
                            <h5>Job Detail</h5>
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
                                        <a href="{{ URL::to('admin/job/post-new-job') }}" class="pull-right"><span  class="label label-primary">New</span></a>
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
                                        <th>Job Title</th>
                                        <td>{{ $jobPost->jobTitle }}</td>
                                    </tr>
                                    <tr>
                                        <th>Department</th>
                                        <td>{{ $jobPost->department->departmentName }}</td>
                                    </tr>
                                    <tr>
                                        <th>Deadline</th>
                                        <td>{{ $jobPost->deadline }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{{ $jobPost->jobDescription }}</td>
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