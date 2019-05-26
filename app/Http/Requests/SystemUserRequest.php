<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed phone_number
 * @property mixed name
 * @property mixed email
 */
class SystemUserRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'name' => 'required',
			'phone_number' => 'required|numeric|digits_between:10,10|unique:system_users',
			'email' => 'required|string|email|unique:system_users',
		];
	}
}
