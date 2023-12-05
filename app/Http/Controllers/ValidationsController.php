<?php

namespace App\Http\Controllers;

use App\Http\Resources\ValidationResource;
use App\Models\Validations;
use Illuminate\Http\Request;

class ValidationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validate = $request->validate($request->all());
        // if ($validate) {
        Validations::create([
            'society_id'        => rulAuth($request)->id,
            'work_experience'   => $request->work_experience,
            'job_category_id'   => $request->job_category_id,
            'reason_accepted'   => $request->reason_accepted,
            'job_position'      => $request->job_position
        ]);
        // }

        return response()->json(['message' => 'Permintaan validasi data berhasil dikirim'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function getValidation()
    {
        $validations = Validations::latest()->get();
        
        return returnData([
                 ValidationResource::collection($validations)
            ]);
            // response()->json($validations, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Validations $validations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Validations $validations)
    {
        //
    }
}
