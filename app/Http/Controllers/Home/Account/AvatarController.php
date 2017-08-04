<?php

namespace App\Http\Controllers\Home\Account;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Authenticatable;
use Intervention\Image\Facades\Image;
use MediaUploader;
use Plank\Mediable\Exceptions\MediaUploadException;

class AvatarController extends Controller {

    public function showForm(Request $request) {

        $user = Auth::user();

        if($user->hasMedia('avatar')) {
            $user_avatar_url = $user->getMedia('avatar')->first()->getUrl();
        } else {
            $user_avatar_url = null;
        }

        return view('home.account.avatar', [
			'title' => 'Home avatar',
			'pageclass' => 'home_avatar',
            'avatar_url' => $user_avatar_url,
		]);

	}

	public function save(Request $request) {

      $this->avatarValidator($request->all())->validate();

       try {
            $media_origin = MediaUploader::fromSource($request->file('image_file'))
            ->toDisk('private')
            ->toDirectory('avatars')
            ->onDuplicateIncrement()
            ->useHashForFilename()
            ->setAllowedAggregateTypes(['image'])
            ->upload();
        } catch(MediaUploadException $e) {
            //dd($e->getMessage());
            return redirect()->back()->with('error_msg', $e->getMessage());
        }

        $image_resized = Image::make($request->file('image_file'))->resize(null, 130, function ($constraint) {
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
            //dd($e->getMessage());
            return redirect()->back()->with('error_msg', $e->getMessage());
        }

        $user = Auth::user();

        $user->syncMedia($media_resized, 'avatar');
        $user->syncMedia($media_origin, 'avatar_origin');
        $user->save();

		return redirect()->back()->with('msg', "Changes saved");
	}

	protected function avatarValidator(array $data) {

        $rules = array(
          'image_file' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
        );


		$messages = [
			'image_file.required' => 'File not select',
            'image_file.mimes' => 'File msut be jpg, png or gif format',
            'image_file.max' => 'File too large. Maximum size 10M',

		];

		return Validator::make($data, $rules, $messages);
	}

    public function delete(Request $request) {
        $user = Auth::user();

        $media = $user->getMedia('avatar');
        $user->detachMedia($media, 'avatar');

        $media = $user->getMedia('avatar_origin');
        $user->detachMedia($media, 'avatar_origin');

        $user->save();

        return redirect()->back()->with('msg', "Changes saved");
    }
}
