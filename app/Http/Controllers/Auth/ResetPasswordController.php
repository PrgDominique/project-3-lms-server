<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utils\ValidationUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    public function update(Request $request)
    {
        $id = $request->id;
        $token = $request->token;
        $password = $request->password;

        $result = ValidationUtil::validateId($id);
        if ($result != null) {
            return response()->json([
                'status' => 'fail',
                'message' => $result,
            ], 400);
        }

        $result = ValidationUtil::validateToken($token);
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

        // TODO: Find user by id
        // TODO: Check token
        // TODO: Update password

        return response()->json([
            'success' => 'Password changed successfully'
        ]);
    }
}
