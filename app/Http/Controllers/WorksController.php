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
use URL;
use Session;

class WorksController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('editor', ['only' => ['deleted', 'restore', 'create', 'store', 'edit', 'update', 'destroy']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Input::has('query')) {
			$query = Input::get('query');
			$works = Work::Search($query)->simplePaginate(30);
			return view('home')->with('works',$works)->with('query', $query)->with('title', 'Showing Results for "'.$query.'"');
		}

		return view('home')->with('works', Work::ID()->simplePaginate(30));
	}

	public function middleSchool()
	{
		return view('home')->with('works', Work::MiddleSchool()->simplePaginate(30));
	}

	public function jazz()
	{
		return view('home')->with('works', Work::Jazz()->simplePaginate(30));
	}

	public function marchingBand()
	{
		return view('home')->with('works', Work::marchingBand()->simplePaginate(30));
	}

	public function scoreOnly()
	{
		return view('home')->with('works', Work::ScoreOnly()->simplePaginate(30));
	}

	public function recentWorks()
	{
		return view('home')->with('works', Work::RecentWorks()->simplePaginate(30));
	}

	public function checkedOut()
	{
		return view('home')->with('works', Work::CheckedOut()->simplePaginate(30));
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

//Below methods require editor or admin

	public function deleted()
	{
		return view('home')->with('works', Work::onlyTrashed()->simplePaginate(30))->with('restore', true);
	}

	public function restore($id){
		$work = Work::withTrashed()->where('id', $id)->restore();
		return Redirect::route('works.index')->with('message-success', 'Work Restored.');
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
		return Redirect::route('works.index')->with('message-success', 'Work Created.');
	}
	/**''
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$work = Work::findorFail($id);
		Session::flash('url',Request::server('HTTP_REFERER'));
		return view('edit')->with('work', $work)->with('message-success', 'Work Edited.');
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
		//return Redirect::route('works.index')->with('message-success', 'Work Updated.'); //Old Failsafe
		return Redirect::to(Session::get('url'))->with('message-success', 'Work Updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Work::findorFail($id)->delete();
		return Redirect::route('works.index')->with('message-success', 'Work Deleted.');
	}

}
