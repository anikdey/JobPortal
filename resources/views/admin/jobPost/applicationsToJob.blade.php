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
                        <div class="col-lg-12">
                            <h5>Application to job : {{ $jobPost->jobTitle }} | Department : {{ $jobPost->department->departmentName }}</h5>
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
                                        <button class="btn btn-sm btn-danger" id="deleteButton_{{$application->id}}" onclick="ajaxDelete('{{ $application->id }}');">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            <script>
                                function ajaxDelete($applicationId) {
                                    var $chk = confirm('Are You Sure You Want To Delete This?');
                                    if($chk) {
                                        var applicationId = $applicationId;
                                        var url = "{{ URL::to('/admin/job/ajax-delete-application') }}";
                                        var csrf = "{{ csrf_token() }}";
                                        $.ajax({
                                            dataType: "json",
                                            type: 'POST',
                                            url: url,
                                            data: {applicationId: applicationId, _token: csrf},
                                            success: function (data) {
                                                console.log(data);
                                                var buttonId = document.getElementById("deleteButton_"+applicationId);
                                                //$(buttonId).closest('tr').remove();
                                                //$(buttonId).closest('tr').fadeOut("slow").remove();
                                                $(buttonId).closest('tr').fadeOut(2000,function()
                                                {
                                                   //$(buttonId).closest('tr').remove();
                                                });
                                            }
                                        });
                                    } else {
                                        return false;
                                    }
                                }
                            </script>
                        </tbody>
                    </table>
                    <div class="box-footer clearfix">
                        {{--{{ $applications->links() }}--}}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</div>
@endsection