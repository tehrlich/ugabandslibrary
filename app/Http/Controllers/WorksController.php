<?php namespace App\Http\Controllers;

use App\Work;
use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use Auth;
use Redirect;
use App\Http\Requests\WorkRequest;
use Request;
use Input;
use DB;

class WorksController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Input::has('name')) {
			$query = Input::get('name');
			$queryRaw = "%".$query."%";
			$identifier = DB::table('works')->where('identifier', 'LIKE', $queryRaw)->get();
			$name = DB::table('works')->where('name', 'LIKE', $queryRaw)->get();
			$composer = DB::table('works')->where('composer', 'LIKE', $queryRaw)->get();
			$editor = DB::table('works')->where('editor', 'LIKE', $queryRaw)->get();
			$arranger = DB::table('works')->where('arranger', 'LIKE', $queryRaw)->get();
			$sum = array_merge($identifier, $name, $composer, $editor, $arranger);
			return view('home')->with('works',$sum)->with('query', $query)->with('title', 'Showing Results for "'.$query.'"');
		}

		$works = Work::ID()->simplePaginate(30);
		return view('home')->with('works', $works);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(WorkRequest $request)
	{
		$input = Request::all();
		$input['lastEditedBy'] = Auth::user()->name;
		Work::create($input);
		return Redirect::route('works.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$work = Work::findorFail($id);
		return view('show')->with('work', $work);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$work = Work::findorFail($id);
		return view('edit')->with('work', $work);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, WorkRequest $request)
	{
		$work = Work::findorFail($id);
		$request['lastEditedBy'] = Auth::user()->name;
		$work->update($request->all());
		return Redirect::route('works.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$work = Work::findorFail($id);
		$work->delete();
		return Redirect::route('works.index');
	}

}
