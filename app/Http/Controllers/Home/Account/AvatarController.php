<?php

namespace App\Http\Controllers\Home\Account;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use \Illuminate\Http\File;

class AvatarController extends Controller {
	public function showForm(Request $request) {

		return view('home.account.avatar', [
			'title' => 'Home avatar',
			'pageclass' => 'home_avatar',
		]);

	}

	public function saveForm(Request $request, Authenticatable $user) {

    if ($request -> hasFile('image_file')) {

        $storage_path = Storage::disk('private')->putFile('avatars', Input::file('image_file'));
        $storage_name = basename($storage_path);

        //Storage::disk('avatars')->setVisibility($storage_path, 'private');

                dd($storage_path, Storage::disk('private')->getVisibility($storage_path));

        dd($storage_name);

        $image_resized = Image::make(Input::file('image_file'))->resize(null, 250, function ($constraint) {
            $constraint->aspectRatio();
        })->stream('jpg', 100);

        $storage_name_resized = "resized_".$storage_name;

        Storage::disk('avatars')->put($storage_name_resized, $image_resized);
        //dd($storage_name, $storage_name_resized, $image_resized);
        $user->avatar_origin_path = $storage_name;
        $user->avatar_resized_path = $storage_name_resized;
        $user->save();
    }
        //$this->avatarValidator($request->all())->validate();


		return redirect()->back()->with('status', "Changes saved");
	}

	protected function avatarValidator(array $data) {
		$rules = [
			'name' => 'required',
		];

		$messages = [
			'name.required' => 'Please enter your name',
		];

		return Validator::make($data, $rules, $messages);
	}
}
