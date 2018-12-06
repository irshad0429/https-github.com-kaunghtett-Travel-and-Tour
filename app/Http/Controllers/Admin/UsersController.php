<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\User;
class UsersController extends Controller
{
    //

	public function __construct() {

		$this->middleware('auth');
	}


	public function index() {

		$users = User::latest()->get();
		return view('admin.users.index', compact('users'));
	}

	public function create() {
		return view('admin.users.create');
	}

	public function store(Request $request) {

		$request->validate([

			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:6|confirmed',

		]);

		$users = User::Create([

			'name' => request('name'),
			'email' => request('email'),
			'password' => Hash::make(request('password')),


		]);

		return redirect('/users');


	}

	public function edit($id){

		$users = User::findorfail($id);

		return view('admin.users.edit', compact('users'));

	}

	public function update(Request $request, $id) {


		$request->validate([

			'name' => 'required|string|max:255',
			
			'current-password' => 'required',

			'password' => 'required|min:6',

		]);


		$users = User::findorfail($id);


			//current password check //
		if (Hash::check($request->get('current-password'), $users->password)) {
            // The passwords matches	

            $users->name = $request->get('name');

			$users->password = Hash::make($request->get('password'));

			$users->save();
		
		}

		else{

			return alert("wrong pass");
		}

		return redirect('/users');

	}

	public function profile($id) {

		$users = User::findorfail($id);

		return view('admin.users.username', compact('users'));
	}


	public function upgrade(Request $request,$id) {

		$request->validate([

			'name' => 'required|string|max:255',
			
			'current-password' => 'required',

			

		]);


		$users = User::findorfail($id);


			//current password check //
		if (Hash::check($request->get('current-password'), $users->password)) {
            // The passwords matches	

            $users->name = $request->get('name');

            $users->save();

           
        }

        else {
			return alert("wrong pass");
        }


		

		return redirect('/users');



	}



	public function show($id) {

		$users = User::findorfail($id);

		return view ('admin.users.show', compact('users'));

	}

	public function destory($id) {

		$users = User::findorfail($id);

		$users->delete();

		return redirect('/users');
	}

	public function navprofile($id) {

		$users = User::findorfail($id);

		return view('admin-layouts.nav', compact('users'));

	}

}
