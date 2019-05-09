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


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('Admin');

    }
	
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function update_user(){
        $users = DB::table('users')->get();

        return view('update_user', ['users' => $users]);
    }

    public function store_update_user(\Illuminate\Http\Request  $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:50',
			'role' => 'required',
          //'password' => 'required|min:6|confirmed',
        ]);
        $email = Request::input('email');
		$role = Request::input('role');
        if ($validator->fails()) {
            return redirect('update_user')
                ->withErrors($validator)
                ->withInput();
        }
        else{

         //   $password =  Request::input('password');

            try
            {
				User::where('email',$email)->update(['role'=>$role]);
           
                return redirect('/update_user')->with('flash_success',"User Info Updated Successfully !");
            }
            catch (\Exception $e)
            {
                // Return error if wrong
                return redirect()->back()->withErrors('Oops! Something gone wrong! Please try again!');
            }
        }
    }

    public function add_device(){
        return view ('add_device');
    }

    public function store_add_device(\Illuminate\Http\Request $request){

        $validator = Validator::make($request->all(), [
            'device_name' => 'required|max:10|unique:devices',
            'mac_address' => array(
                'required','unique:devices',
                'regex:/^(?:[0-9a-zA-Z]{2}[:]?){6}$/'
            ),
        ]);

        $device_name = Request::input('device_name');
        $mac_address = Request::input('mac_address');

        if ($validator->fails()) {
            return redirect('add_device')
                ->withErrors($validator)
                ->withInput();
        }
        else {

            try
            {
                // Attempt to save to DB
                $device = array([
                    'device_name' => $device_name,
                    'mac_address' => $mac_address,
                ]);

                DB::table('devices')->insert($device);

                Session::flash('flash_success', 'Device successfully added!');
                return redirect('/add_device');
            }
            catch (\Exception $e)
            {
                Session::flash('flash_error', 'Something went wrong! Please try again!');
                return redirect()->back();
            }
        }
    }
    
	public function update_device(){
        $devices = DB::table('devices')->get();
        return view('update_device', ['devices' => $devices]);
    }

    public function store_update_device(\Illuminate\Http\Request  $request){

        $mac = Request::input('mac_address');
        try
        {
        if(DB::table('devices')->where('mac_address', '=', $mac)->exists())
        {
                DB::table('devices')->where('mac_address', '=', $mac)->delete();
                return redirect('/update_device')->with('flash_success',"Device Info Updated Successfully!");
        }
        else
        {
        return redirect()->back()->withErrors('Oops! MAC Address Existed, Please insert Unique MAC Address!');
        }
        }
        catch (\Exception $e)
        {
            // Return error if wrong
            return redirect()->back()->withErrors('Oops! Something went wrong!');
        }
    }

    public function remove_user(){
        $users = DB::table('users')->get();

        return view('remove_user', ['users' => $users]);
    }

     public function store_remove_user(\Illuminate\Http\Request $request){

        $email = Request::input('email');
        try
        {
        if(DB::table('users')->where('email', '=', $email)->exists())
        {
                DB::table('users')->where('email', '=', $email)->delete();
                return redirect('/remove_user')->with('flash_success',"User Removed Successfully!");
        }
        else
        {
        return redirect()->back()->withErrors('Oops! Email is Incorrect!');

        }
        }
        catch (\Exception $e)
        {
            // Return error if wrong
            return redirect()->back()->withErrors('Oops! Something went wrong!');
        }
    }
    
   
}
