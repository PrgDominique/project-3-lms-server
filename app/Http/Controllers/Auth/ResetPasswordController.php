<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function update(Request $request)
    {
        // Get id, token, password
        $id = $request->id;
        $token = $request->token;
        $password = $request->password;

        // TODO: Validate inputs
        // TODO: Find user by id
        // TODO: Check token
        // TODO: Update password

        return response()->json([
            'success' => 'Password changed successfully'
        ]);
    }
}
