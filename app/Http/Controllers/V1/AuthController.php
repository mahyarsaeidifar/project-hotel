<?php

namespace App\Http\Controllers\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile'   => 'required|exists:users,mobile',
            'password' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'flag' => 'validation_error',
                'errors' => 'has a error'
            ], 400);
        }

        $user = User::query()->where('mobile', $request->mobile)->first();

        if (! $user || ! Hash::check($request->get('password'), $user->password)) {
            throw ValidationException::withMessages([
                'mobile' => __('auth.failed'),
            ]);
        }

        $token = $user->createToken($request->ip())->plainTextToken;

        if($token) {
           $user = PersonalAccessToken::findToken($token);

            return response([
                'status' => 200,
                'flag' => 'success',
                'token' => $token,
                'admin' => $user->tokenable,
            ]);
        }

        return response([
            'status' => 400,
            'flag' => 'invalid_credentials',
            'errors' => [
                __('incorrectData')
            ]
        ], 400);

    }


    public function logout()
    {
       auth()->logout();

       return response()->json(['status' => 'success'], 200);
    }

}
