<?php

namespace App\Http\Controllers;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('home', [
			'file' => auth()->user()->load('file')->file()->first(),
		]);
	}

	/**
	 * logout admin
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function logout() {
		auth()->logout();
		session()->flush();
		toastr()->success('Hope to see you soon :)');
		return redirect()->route('login');
	}
}
