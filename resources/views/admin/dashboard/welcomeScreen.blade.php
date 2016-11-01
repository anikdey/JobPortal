@extends('layouts.master')
@section('title')
Dashboard
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-lg-8">
                            <h5>List of all Countries</h5>
                        </div>
                        <div class="col-lg-4">
                            <div class="ibox-tools">
                                 <a href="{{ URL::to('') }}" class="pull-right"><span  class="label label-primary">Add New Country</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                   <div class="row">

                   </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection