<style>
    .custom
    {
        text-align: center;
        color: #D8000C;
        font-weight: 100;
        font-family: 'Lato', sans-serif;
        font-size: 72px;
    }
</style>
@extends('layouts.app')
@section('robots')
    <meta name="googlebot" content="noindex">
@endsection
@section('title')
    Error 404
@endsection

<!-- Inside Container -->
@section('content')



<br>
<div class="well" style=" background: rgb(250, 250, 250);">
    <br>

    <div class="custom" style="font-size: 25px;color: #2e3436;">
        <img src="{{ asset('images/404.png') }}" alt="404" title="No copyright infringement intended, Please contact developer via Contact Page if removal of this image is required.">
        <br><br>
        If you wish to go back to Home page, click button below!<br><br>
        <a href="{{ url('/') }}" class="btn btn-default btn-lg" role="button">Home</a>
    </div>
<br><br>
</div>

@endsection