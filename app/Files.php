<?php

namespace App;

use App\Uuids\Uuids;
use Illuminate\Database\Eloquent\Model;

class Files extends Model {
	use Uuids;

	/**
	 * Indicates if the IDs are auto-incrementing.
	 *
	 * @var bool
	 */
	public $incrementing = false;


	//create casts
	public $casts = [
		'file_paths' => 'array',
	];
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id',
		'file_paths',
	];

	/**
	 * relationships here
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user() {
		return $this->belongsTo(User::class);
	}

}
