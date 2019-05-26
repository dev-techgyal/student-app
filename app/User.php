<?php

namespace App;

use App\Uuids\Uuids;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
	use Notifiable, Uuids;

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
		'reg_no',
		'phone_number',
		'email',
		'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * relationships here
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function file() {
		return $this->hasOne(Files::class);
	}
}
