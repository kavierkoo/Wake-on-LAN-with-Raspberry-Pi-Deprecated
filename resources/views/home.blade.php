<style>
    .custom
    {
        text-align: center;
        color: #D8000C;
        font-weight: 100;
        font-family: 'Lato', sans-serif;
    }
    .block
    {
        padding: 7px;
    }

    .btn.btn-lg{
        font-size:2.2em;
        width:50%;
        height:7.5%;
    }

    .pleximg{
        max-width: 40%;
        height: auto;
    }
    .wolimg{
        max-width: 30%;
        height: auto;
    }
    .pleximgdiv{
        text-align: center;
    }
    @media only screen and (max-width: 1500px) {
        .btn.btn-lg{
            font-size:2em;
            width:50%
        }

        .pleximg{
            max-width: 40%;
            height: auto;
        }
        .wolimg{
            max-width: 30%;
            height: auto;
        }
        .pleximgdiv{
            text-align: center;
        }
    }
    @media only screen and (max-width: 400px) {
        .btn.btn-lg{
            font-size:1.5em;
            width:100%
        }

        .pleximg{
            max-width: 100%;
            height: auto;
        }
        .wolimg{
            max-width: 70%;
            height: auto;
        }
        .pleximgdiv{
            text-align: center;
        }
    }
</style>
@extends('layouts.app')
@section('robots')
    <meta name="googlebot" content="noindex">
@endsection
@section('title')
    Wake On LAN
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-body">
                <div class="custom" style="color: #2e3436;">

                    <div class = "well">
                        <div class="pleximgdiv"><img class="wolimg"src="{{ asset('images/wol.png') }}" alt="WOL" title="No copyright infringement intended, Please contact developer via Contact Page if removal of this image is required."></div>
                        <div class="block"> </div>
                        @if(isset($devices) )
                            @foreach($devices as $device)
								<!-- Devices only show with admin right-->
								@if( Auth::user()->role == 1)
									{!! Form::open(['class'=>'form-horizontal','url'=>'/']) !!}
									{!! Form::hidden('buttonid', $device->device_name)  !!}
									{!! Form::submit('WOL: '.ucfirst($device->device_name),['class'=>'btn btn-default btn-lg ','style'=>'font-weight: bold;']) !!}
									{!! Form::close() !!} <!--End of Form-->
								@else
									<!-- Devices show to all users -->
									@if($device->device_name == "plex")
										{!! Form::open(['class'=>'form-horizontal','url'=>'/']) !!}
										{!! Form::hidden('buttonid', $device->device_name)  !!}
										{!! Form::submit('WOL: '.ucfirst($device->device_name),['class'=>'btn btn-default btn-lg ','style'=>'font-weight: bold;']) !!}
										{!! Form::close() !!} <!--End of Form-->
									@endif	
								@endif	
                            @endforeach
                        @endif
                        <div class="block"> </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
@endsection
