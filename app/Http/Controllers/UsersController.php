<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request; why can't I use this?
use App\User;
use App\Http\Requests\UserRequest;
use Input;
use Redirect;
use Request;
use Auth;
use Hash;

class UsersController extends Controller {

	public function __construct()
	{
		$this->middleware('admin');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('users')->with('users', User::All());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UserRequest $request)
	{
		$input = Request::all();
		$password = Hash::make(Request::input('password'));
		$input['password'] = $password;
		User::create($input);
		return Redirect::route('users.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::findorFail($id)->delete();
		return Redirect::route('users.index');
	}

}
