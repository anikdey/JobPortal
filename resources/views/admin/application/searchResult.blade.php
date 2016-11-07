<h3>Search Result</h3>
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
            </tr>
        @endforeach
    </tbody>
</table>