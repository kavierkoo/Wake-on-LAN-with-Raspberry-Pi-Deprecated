@extends('layouts.app')
@section('robots')
    <meta name="googlebot" content="noindex">
@endsection
@section('title')
Remove Device 
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Remove Device</div>
                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/update_device') }}">
                            {{ csrf_field() }}


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
                                        Remove
                                    </button>
                                </div>
                            </div>
                        </form>

                        <br>
                        <legend>Existing Device Information</legend>
                        <table class="table table-striped table-bordered text-center "style="margin-bottom: 0px;">
                            <thead>
                            <tr>
                                <th class="text-center">Device Name</th>
                                <th class="text-center">MAC Address</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($devices as $device)
                                <tr>
                                    <td>{{$device->device_name}}</td>
                                    <td>{{$device->mac_address}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
