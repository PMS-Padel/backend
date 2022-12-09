<?php

namespace App\Http\Controllers;

use App\Jobs\SendAccountVerificationEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password','role')) && !Auth::attempt($request->only('username', 'password','role'))) {
            return response()->json([
                'message' => __('auth.login_error'),
            ], 400);
        }

        $user = $request['email'] ?
            User::where('email', $request['email'])->firstOrFail()
            : User::where('username', $request['username'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'name' => $user->name,
        ]);
    }

    public function register(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8|max:30',
            'name' => 'string',
            'gender' => 'string',

        ]);

        if ($validation->fails()) {
            return response()->json([
                'errors' => $validation->errors(),
                'message' => __('auth.wrong_format'),
            ], 400);
        }


        if (isset($userWithEmail)) {
            return response()->json([
                'message' => 'Uma conta com este email existe',
            ], 400);
        }

        do {
            $six_digit_random_number = random_int(100000, 999999);
            $user = User::where('user_code', $six_digit_random_number) -> first();
        } while (isset($user));

        $user = User::create([
            "email" => $request->email,
            "name" => $request->name,
            "password" => Hash::make($request->password),
            "user_code" => $six_digit_random_number,
            "role" => "player",
            "gender" => $request->gender,
        ]);

        //$user->sendEmailVerificationNotification();

        return response()->json([
            'message' => 'Conta criada com sucesso',
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'logged out',
        ]);
    }
}
