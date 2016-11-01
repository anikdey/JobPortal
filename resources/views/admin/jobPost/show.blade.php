@extends('layouts.master')
@section('title')
Show Job
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="row">
        <div class="col-lg-12">
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
                                        <a href="{{ URL::to('admin/job/post-new-job') }}" class="pull-right"><span  class="label label-primary">Post New Job</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-6">
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

                        <div class="col-lg-6">
                            <h5>Applicants</h5>
                            @if(count($jobPost->application) > 0)
                            <table class="table table-responsive table-bordered  table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">Full Name</th>
                                    <th class="text-center">Mobile</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Picture</th>
                                    <th class="text-center">CV</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobPost->application as $application)
                                        <tr>
                                            <td class="text-center">{{ $application->fullName }}</td>
                                            <td class="text-center">{{ $application->mobileNumber }}</td>
                                            <td class="text-center">{{ $application->email }}</td>
                                            <td class="text-center">
                                                @if($application->picture)
                                                    <img src="{{ URL::to('admin/images/'.$application->picture) }}" height="50" width="50" alt="" />
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($application->cv)
                                                    <a href="{{ URL::to('admin/download-cv/'.$application->cv) }}" class="btn btn-sm btn-warning">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                    <a href="{{ URL::to('admin/show-cv/'.$application->cv) }}" target="_blank" class="btn btn-sm btn-info">
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                @else
                                                    No CV
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <h3>No applications submitted yet.</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</div>
@endsection