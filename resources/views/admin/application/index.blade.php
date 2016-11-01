@extends('layouts.master')
@section('title')
Application List
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
                            <h5>Application List</h5>
                        </div>
                        <div class="col-lg-10">
                            <div class="ibox-tools">
                                <div class="row">
                                    <div class="col-lg-3">
                                        @if (Session::has('message'))
                                          <div class="text-success">{{ Session::get('message') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-responsive table-bordered  table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">Full Name</th>
                            <th class="text-center">Mobile</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Expected Salary</th>
                            <th class="text-center">Job</th>
                            <th class="text-center">Department</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">Picture</th>
                            <th class="text-center">CV</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $application)
                                <tr>
                                    <td class="text-center">{{ $application->fullName }}</td>
                                    <td class="text-center">{{ $application->mobileNumber }}</td>
                                    <td class="text-center">{{ $application->email }}</td>
                                    <td class="text-center">{{ $application->expectedSalary }}</td>
                                    <td class="text-center">{{ $application->job->jobTitle }}</td>
                                    <td class="text-center">{{ $application->department->departmentName }}</td>
                                    <td class="text-center">{{ $application->address }}</td>
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
                                    <td class="text-center">
                                        <a href="{{ URL::to('admin/application/delete/'.$application->id) }}" class="btn btn-sm btn-danger" onclick="return checkDelete();" >
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="box-footer clearfix">
                        {{ $applications->links() }}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</div>
@endsection