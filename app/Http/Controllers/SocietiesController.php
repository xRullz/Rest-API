<?php

namespace App\Http\Controllers;

use App\Models\Societies;
use Illuminate\Http\Request;

class SocietiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Societies::where('login_tokens', $request->token)->first();

        return returnData([
            'id_card_number' => $user->id_card_number,
            'name' => $user->name,
            'born_date' => $user->born_date,
            'gender' => $user->gender,
            'address' => $user->address,
            'token' => $user->login_tokens,
            'regional' => $user->regional
        ]);
    }
}
