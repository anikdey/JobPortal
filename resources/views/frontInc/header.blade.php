@extends('layouts.frontEndMaster')
@section('header')
<div class="blog-masthead">
  <div class="container">
    <nav class="blog-nav">
      <a class="blog-nav-item active" href="{{ URL::to('/') }}">Home</a>
    </nav>
  </div>
</div>
@endsection