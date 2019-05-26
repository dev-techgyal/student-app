<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest {
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
			'phone_number' => 'required|numeric|digits_between:10,10|unique:users',
			'reg_no' => 'required|string|unique:users',
			'email' => 'required|string|email|unique:users',
			'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:3000',
			'certificate' => 'required|max:10000|mimes:pdf,doc,docx,rtf',
		];
	}
}
