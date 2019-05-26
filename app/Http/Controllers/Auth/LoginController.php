<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SystemController;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller {
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/home';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest')->except('logout');
	}


	/**
	 * Show the page for logging in the admin
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getAdminLoginPage() {
		return view('auth.admin.login');
	}

	/**
	 * Authenticate the system admin
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function authenticateAdmin() {
		$this->validate(request(), [
			'email' => 'required',
			'password' => 'required',
		]);

		// Set the authentication credentials
		$credentials = request(['email', 'password']);

		// Try to authenticate the admin
		if (!auth()->guard('admin')->attempt($credentials)) {

			//log this
			SystemController::log($credentials, 'success', 'admin-login-error');

			return redirect()->back()->with('error', 'These credentials do not match our records.')->withInput(request()->except('password'));
		}

		//log this
		SystemController::log($credentials, 'success', 'admin-login');

		//update this
		$admin = auth('admin')->user();
		$admin->updated_at = Carbon::now();
		$admin->update();

		return redirect()->route('admin.home');
	}
}
