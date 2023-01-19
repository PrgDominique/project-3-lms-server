<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utils\ValidationUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;




class LoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $result = ValidationUtil::validateEmail($email);
        if ($result != null) {
            return response()->json([
                'status' => 'fail',
                'message' => $result,
            ], 400);
        }

        $result = ValidationUtil::validatePassword($password);
        if ($result != null) {
            return response()->json([
                'status' => 'fail',
                'message' => $result,
            ], 400);
        }

        $user = User::where('email', $email)->first();
        if ($user == null) {
            return response()->json([
                'status' => 'fail',
                'message' => 'User not found',
            ], 404);
        }

        if (!password_verify($password, $user->password)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Password is incorrect',
            ], 400);
        }
    }
}
