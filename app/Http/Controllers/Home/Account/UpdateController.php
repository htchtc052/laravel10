<?php

namespace App\Http\Controllers\Home\Account;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UpdateController extends Controller {
	public function showForm(Request $request) {
		return view('home.account.update', [
			'title' => 'Home update',
			'pageclass' => 'home_update',
		]);

	}

	public function saveForm(Request $request) {
		$this->updateValidator($request->all())->validate();

		$user = Auth::user();

		$user->name = $request['name'];

		$user->save();

		return redirect()->route('home')->with('status', "Changes saved");
	}

	protected function updateValidator(array $data) {
		$rules = [
			'name' => 'required',
		];

		$messages = [
			'name.required' => 'Please enter your name',
		];

		return Validator::make($data, $rules, $messages);
	}
}
