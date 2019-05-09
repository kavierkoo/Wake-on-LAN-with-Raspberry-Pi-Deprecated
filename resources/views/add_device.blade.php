@extends('layouts.app')
@section('robots')
    <meta name="googlebot" content="noindex">
@endsection
@section('title')
Add Device
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Device</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/add_device') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('device_name') ? ' has-error' : '' }}">

                                <!-- Device Name -->
                                <label for="device_name" class="col-md-4 control-label">Device Name</label>

                                <div class="col-md-6">
                                    <input id="device_name" type="text" class="form-control" name="device_name" value="{{ old('device_name') }}" placeholder="Name shows on WOL button" required autofocus>
                                    @if ($errors->has('device_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('device_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!-- MAC Address -->
                            <div class="form-group{{ $errors->has('mac_address') ? ' has-error' : '' }}">
                                <label for="mac_address" class="col-md-4 control-label">MAC Address</label>

                                <div class="col-md-6">
                                    <input id="mac_address" type="text" class="form-control" name="mac_address" value="{{ old('mac_address') }}" placeholder="e.g. : XX:XX:XX:XX:XX:XX" required>

                                    @if ($errors->has('mac_address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('mac_address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
