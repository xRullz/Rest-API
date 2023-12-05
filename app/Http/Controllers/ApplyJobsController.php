<?php

namespace App\Http\Controllers;

use App\Models\ApplyJobs;
use App\Models\ApplySocieties;
use App\Models\Societies;
use App\Models\Validations;
use Illuminate\Http\Request;

class ApplyJobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $applyJobs = ApplyJobs: :
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validations::where('society_id', $request->id)->first();
        dd($validate);
    }
}
