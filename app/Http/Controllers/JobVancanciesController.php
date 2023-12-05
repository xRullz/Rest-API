<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobVacanyResource;
use App\Models\ApplyJobs;
use App\Models\JobVacancies;
use Illuminate\Http\Request;

class JobVancanciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $job = JobVacancies::latest()->get();

        return returnData([
            'Lowongan' => JobVacanyResource::collection($job)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function vacancyById($id)
    {
        if (request('date')) {
            $ymd = date('Y-m-d', \request('date'));
        } else {
            $ymd = date('Y-m-d');
        }
        $vacancy = JobVacancies::where('id', $id)->first();
// dd($vacancy->societie);
        if (is_null($vacancy) )
        {
            return returnMessage('Data Not Found', 404);
        } else {
           if (date('Y-m-d', strtotime($vacancy->created_at)) === $ymd) {
               return returnData([
                   'date' => date('F d, Y', strtotime($vacancy->created_at)),
                   'vacancy' => [
                       'id' => $vacancy->id,
                       'category' => $vacancy->category,
                       'company' => $vacancy->company,
                       'address' => $vacancy->address,
                       'description' => $vacancy->description,
                       'available_position' => $vacancy->job,
                       'apply_count' => count($vacancy->societie)
                   ],
               ]);
           }
           return returnMessage('Data Not Found', 404);
        }
    }
}
