<?php

namespace App\Http\Controllers;

use App\Files;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\SystemUserRequest;
use App\SystemUser;
use App\User;

class AdminController extends Controller {
	/**
	 * set accessibility
	 */
	public function __construct() {
		$this->middleware('auth:admin');
	}

	/**
	 * get admin dashboard
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function adminDashBoard() {
		return view('admin.home', [
			'students' => count(User::all()),
			'files' => count(Files::all()),
			'sys_users' => count(SystemUser::all()),
		]);
	}

	/**
	 * system user
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function addSystemUserPage() {
		return view('admin.add-sys-user');
	}

	/**
	 * add system user
	 * @param SystemUserRequest $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function addSystemUser(SystemUserRequest $request) {
		$sys_user = SystemUser::query()->create([
			'name' => $request->name,
			'phone_number' => $request->phone_number,
			'email' => $request->email,
		]);

		if ($sys_user)
			return redirect()->back()->with('success', 'System User Added.');
		return redirect()->back()->with('error', 'Failed.');
	}

	/**
	 * view system users
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function viewSystemUser() {
		return view('admin.view-sys-user', [
			'sys_users' => SystemUser::query()->orderByDesc('created_at')->paginate(10),
		]);
	}

	/**
	 * add student page
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function addStudentPage() {
		return view('admin.add-student');
	}

	/**
	 * add student here
	 * @param StudentRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function addStudent(StudentRequest $request) {
		$student = User::query()->create([
			'name' => $request->name,
			'phone_number' => $request->phone_number,
			'reg_no' => $request->reg_no,
			'email' => $request->email,
			'password' => bcrypt($request->reg_no),
		]);

		//store image/certificate
		$check = SystemController::storeStudentFiles($request, $student->id);

		if ($check)
			return redirect()->back()->with('success', $student->name . ' added successfully and password to account is the reg number.');
		return redirect()->back()->with('error', 'Failed.');
	}

	/**
	 * view students here
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function viewStudent() {
		return view('admin.view-student', [
			'students' => User::query()->with('file')->orderByDesc('created_at')->paginate(10),
		]);
	}

	/**
	 * logout admin
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function logout() {
		auth('admin')->logout();
		session()->flush();
		toastr()->success('Hope to see you soon :)');
		return view('auth.admin.login');
	}
}
