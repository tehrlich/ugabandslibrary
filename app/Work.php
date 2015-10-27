<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Work extends Model {

	use SoftDeletes;

	protected $fillable = ['composer', 'identifier', 'name', 'arranger', 'editor', 'publisher', 'oversizedScoreID', 'lastPerformedDate', 'lastPerformedEnsemble', 'notes', 'grade', 'lastEditedBy', 'checkedOut'];

	protected $dates = ['deleted_at'];

	public function scopeID($query)
	{
	        return $query->orderBy('identifier','ASC');
	}

	public function scopeRecentWorks($query)
	{
			return $query->orderBy('identifier','DESC')->where('identifier', 'LIKE', 'C%');
	}

	public function scopeMiddleSchool($query)
	{
			return $query->orderBy('identifier','ASC')->where('identifier', 'LIKE', 'ms%');
	}

	public function scopeJazz($query)
	{
			return $query->orderBy('identifier','ASC')->where('identifier', 'LIKE', 'j%');
	}

	public function scopeMarchingBand($query)
	{
			return $query->orderBy('identifier','ASC')->where('identifier', 'LIKE', 'mb%')->Orwhere('identifier', 'LIKE', 'a%');
	}

	public function scopeScoreOnly($query)
	{
			return $query->orderBy('identifier','ASC')->where('identifier', 'LIKE', 'S%');
	}

	public function scopeCheckedOut($query)
	{
			return $query->orderBy('identifier','ASC')->where('checkedOut', 'NOT LIKE', '');
	}

	public function scopeSearch($query, $search)
	{
			$searchRaw = "%".$search."%";
			return $query->where('identifier', 'LIKE', $searchRaw)->orWhere('name', 'LIKE', $searchRaw)->orWhere('composer', 'LIKE', $searchRaw)
			->orWhere('editor', 'LIKE', $searchRaw)->orWhere('arranger', 'LIKE', $searchRaw);
	}


}
