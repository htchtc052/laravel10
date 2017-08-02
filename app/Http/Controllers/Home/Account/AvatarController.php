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
use MediaUploader;
use Plank\Mediable\Exceptions\MediaUploadException;

class AvatarController extends Controller {

    //use HandlesMediaUploadExceptions;


	public function showForm(Request $request) {
		return view('home.account.avatar', [
			'title' => 'Home avatar',
			'pageclass' => 'home_avatar',
		]);

	}

	public function saveForm(Request $request, Authenticatable $user) {

    if ($request -> hasFile('image_file')) {

        try {
            $media_origin = MediaUploader::fromSource($request->file('image_file'))
            ->toDisk('private')
            ->toDirectory('avatars')
            ->onDuplicateIncrement()
            ->useHashForFilename()
            ->setAllowedAggregateTypes(['image'])
            ->upload();
        } catch(MediaUploadException $e) {
            dd($e->getMessage());
            //TO DO add message to log
        }

        $image_resized = Image::make(Input::file('image_file'))->resize(null, 250, function ($constraint) {
            $constraint->aspectRatio();
        })->stream('jpg', 100);

        try {
            $media_resized = MediaUploader::fromSource($image_resized)
            ->toDisk('public')
            ->toDirectory('avatars')
            ->onDuplicateIncrement()
            ->useHashForFilename()
            ->upload();
        } catch(MediaUploadException $e) {
            dd($e->getMessage());
            //TO DO add message to log
        }

        $user->attachMedia($media_resized, 'avatar');
        $user->attachMedia($media_origin, 'avatar_origin');
        $user->save();

        dd($media_origin, $media_resized);

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
