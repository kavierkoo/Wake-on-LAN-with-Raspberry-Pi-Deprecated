@extends('layouts.app')
@section('robots')
    <meta name="googlebot" content="noindex">
@endsection
@section('title')
Update User Info
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update User</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/update_user') }}">
                            {{ csrf_field() }}
							
							
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" placeholder="E-Mail Address" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
							
							<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                <label for="role" class="col-md-4 control-label">Role</label>

                                <div class="col-md-6">
                                    <select  id="role" name="role" class="form-control" value="{{ Auth::user()->role}}"  required>
									  <option value="1">Admin</option>
									  <option value="0">User</option>									  
									</select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>

                        <br>
                        <legend>Existing User Information</legend>
                        <table class="table table-striped table-bordered text-center "style="margin-bottom: 0px;">
                            <thead>
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
								<th class="text-center">Role</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
									<td>
										@if($user->role == 1)
											Admin
										@else
											User
										@endif
									</td>
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
