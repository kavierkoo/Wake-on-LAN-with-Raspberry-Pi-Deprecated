<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Device;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
	
	public function change_pw(){
        return view ('change_pw');
    }
	    public function index()
    {
        //Connect DB to add MAC etc etc architecture pending to think later
        $devices = DB::table('devices')->get();;
        return view('home',compact('devices'));

    }
	
	 public function toslash()
    {
        return redirect('/');
    }
	
	public function store_change_pw(\Illuminate\Http\Request  $request)
    {

        $userId = Auth::id();

        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect('change_pw')
                ->withErrors($validator)
                ->withInput();
        } else {
            $password =  Request::input('password');
            try {
                User::where('id', $userId)->update(['password'=>bcrypt($password)]);
				return redirect('/change_pw')->with('flash_success', "Password Updated Successfully !");
            } catch (\Exception $e) {
                // Return error if wrong
                return redirect()->back()->withErrors('Oops! Email address has been used!');
            }
        }
    }
	
	public function wol(){
        $buttonid = Input::get('buttonid');
        //WOL Triggered
		//Prefix
		$return_var = -1;
        $output = array();
		
        $mac_address= DB::table('devices')->where('device_name','=',$buttonid)->pluck('mac_address')->first();
        
		$wol_command = "sudo etherwake -i wlan0 ". $mac_address ." 2>&1";
        exec($wol_command, $output, $return_var);
        
		if ($return_var === 0) {
            // success
            Session::flash('flash_success', 'Successfully sent WOL Magic Packet to '.ucfirst($buttonid)."`s PC!" );
        }else{
            // fail or other exceptions
            Session::flash('flash_error','WOL ['. ucfirst($buttonid).'] : '.implode($output));
        }
        return redirect('/');              
    }
}
