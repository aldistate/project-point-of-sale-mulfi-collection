<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editPassword()
    {
        $title = 'Ganti Password';
        $url = 'password';

        return view('change-password', compact('title', 'url'));
    }

    public function updatePassword(Request $request)
    {
        if (Auth::Check()) {
            $requestData = $request->All();
            $validator = $this->validatePasswords($requestData);

            if ($validator->fails()) {
                return back()->withErrors($validator->getMessageBag());
            } else {
                $currentPassword = Auth::User()->password;
                if (Hash::check($requestData['password'], $currentPassword)) {
                    $user = User::find(Auth::User()->id);
                    $user->password = Hash::make($requestData['new-password']);;
                    $user->save();
                    return back()->with('status', 'Kata sandi berhasil di ubah');
                } else {
                    return back()->with('salah', 'Kata sandi sekarang salah');
                }
            }
        } else {
            // Auth check failed - redirect to domain root
            return redirect()->to('/');
        }
    }

    /**
     * Validate password entry
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validatePasswords(array $data)
    {
        $messages = [
            'password.required' => 'Please enter your current password',
            'new-password.required' => 'Please enter a new password',
            'new-password-confirmation.not_in' => 'Sorry, common passwords are not allowed. Please try a different new password.'
        ];

        $validator = Validator::make($data, [
            'password' => 'required',
            'new-password' => ['required', 'same:new-password', 'min:8', Rule::notIn($this->bannedPasswords())],
            'new-password-confirmation' => 'required|same:new-password',
        ], $messages);

        return $validator;
    }

    /**
     * Get an array of all common passwords which we don't allow
     *
     * @return array
     */
    public function bannedPasswords()
    {
        return [
            'password', '12345678', '123456789', 'baseball', 'football', 'jennifer', 'iloveyou', '11111111', '222222222', '33333333', 'qwerty123'
        ];
    }
}
