<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        $is_success = $request->user('sanctum')->tokens()->delete();

        if ($is_success) {
            return response()->json([
                'message' => 'success'
            ]);
        }

        return response()->json([
            'message' => 'failed'
        ], 500);
    }
}
