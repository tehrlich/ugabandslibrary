<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model {

	protected $fillable = ['composer', 'identifier', 'name', 'arranger', 'editor', 'publisher', 'oversizedScoreID', 'lastPerformedDate', 'lastPerformedEnsemble', 'notes', 'grade', 'lastEditedBy'];

	public function scopeID($query)
	{
	        return $query->orderBy('identifier','ASC');
	}

	public function scoperevID($query)
	{
			return $query->orderBy('identifier','DESC');
	}


}
