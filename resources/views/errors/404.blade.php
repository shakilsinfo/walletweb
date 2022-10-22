@extends('frontend.layouts.layouts')
@section('title','404 not found')
@section('content')
<div id="rs-page-error" class="rs-page-error">
    <div class="error-text">
        <h1 class="error-code">404</h1>
        <h3 class="error-message">Page Not Found</h3>
        
        <a class="readon orange-btn" href="{{url('/')}}" title="HOME">Back to Homepage</a>
    </div>
</div>
@endsection