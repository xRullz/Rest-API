<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Societies;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validate = $request->validate([
            'id_card_number' => ['required', 'string', 'max:8'],
            'password' => ['required', 'string']
        ]);

        // if ($validate) return $validate;

        $society = Societies::where([
                ['id_card_number', $request->id_card_number],
                ['password', $request->password]
            ])->with('regional')->first();
        // dd($society);
        if (is_null($society)) {
            return response()->json('ID Card Number or Password incorrect', 401);
        }

        $token = md5($society->id_card_number);

        $society->login_tokens = $token;
        $society->update();

        return response()->json([
            'name' => $society->name,
            'born_date' => $society->born_date,
            'gender' => $society->gender,
            'address' => $society->address,
            'token' => $society->login_tokens,
            'regional' => $society->regional
        ]);
    }

    public function logout(Request $request)
    {
        $society = Societies::where('login_tokens', $request->token)->first();

        if (is_null($society)) return response()->json('Invalid Token', 401);

        $society->login_tokens = null;
        $society->save();

        return response()->json('Logout success', 200);
    }
}
