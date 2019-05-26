<?php

namespace App;

use App\Uuids\Uuids;
use Illuminate\Database\Eloquent\Model;

class SystemUser extends Model {
	use Uuids;

	/**
	 * Indicates if the IDs are auto-incrementing.
	 *
	 * @var bool
	 */
	public $incrementing = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'phone_number',
		'email',
	];
}
