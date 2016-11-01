@extends('layouts.master')
@section('sidebar')
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                    {!! HTML::image('img/profile_small.jpg', 'image', array('class'=>'img-circle')) !!}
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">
                                    {{Auth::User()->name}}
                                </strong>
                            </span>
                            <span class="text-muted text-xs block">
                                {{Auth::User()->role}}
                                <b class="caret"></b>
                            </span>
                        </span>
                    </a>

                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ URL::to('logout') }}">Logout</a></li>
                        <li class="divider"></li>
                    </ul>
                </div>
                <div class="logo-element">
                    CCM+
                </div>
            </li>
            <li>
                <a href="{{ URL::to('admin') }}">
                    <i class="fa fa-dashboard"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>

            <li class="">
                <a href="{{ URL::to('admin/job-list') }}">
                    <i class="fa fa-sliders"></i>
                    <span class="nav-label">Job Postings</span> <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ URL::to('admin/job-list') }}" >
                            Job List
                            <span class="label label-primary pull-right">
                                <i class="fa fa-bars"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('admin/job/post-new-job') }}">
                            Post Job
                            <span class="label label-primary pull-right">NEW</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('admin/job/search-job') }}" >
                            Search Job
                            <span class="label label-primary pull-right">
                                <i class="fa fa-search"></i>
                            </span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="">
                <a href="{{ URL::to('admin/department-list') }}">
                    <i class="fa fa-sliders"></i>
                    <span class="nav-label">Departments</span> <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ URL::to('admin/department-list') }}" >
                            Department List
                            <span class="label label-primary pull-right">
                                <i class="fa fa-bars"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('admin/department/add-new-department') }}">
                            Add Department
                            <span class="label label-primary pull-right">NEW</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="">
                <a href="{{ URL::to('admin/application-list') }}">
                    <i class="fa fa-sliders"></i>
                    <span class="nav-label">Applications</span> <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ URL::to('admin/application-list') }}" >
                            Application List
                            <span class="label label-primary pull-right">
                                <i class="fa fa-bars"></i>
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ URL::to('admin/application-search') }}" >
                            Search Application
                            <span class="label label-primary pull-right">
                                <i class="fa fa-search"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </li>




        </ul>
    </div>
</nav>
@endsection