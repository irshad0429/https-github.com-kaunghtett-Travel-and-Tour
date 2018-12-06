<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\User;


class UsersettingController extends Controller
{
    //
    public function __construct() {
        
        $this->middleware('auth');
        
    }
    
    public function setting(){
        
        
        $users = User::find(auth()->id());

        return view('admin.users.usersetting', compact('users'));
        
    }

    public function update(Request $request) {


		$request->validate([

			'name' => 'required|string|max:255',
			
			'current-password' => 'required',

			
		]);


        $users = User::find(auth()->id());


			//current password check //
		if (Hash::check($request->get('current-password'), $users->password)) {
            // The passwords matches	

            $users->name = $request->get('name');

			$users->password = Hash::make($request->get('password'));

            $users->save();
            
            
		
		}

        
		

		return redirect('/dashboard');

	}
    
    
    
    
    
    
    
}
