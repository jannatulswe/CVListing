<?php

namespace App\Http\Controllers;

use App\CreateCV;
use App\JobCV;
use App\Jobdetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index($category)
    {

        $jobs = collect();
        $cv = CreateCV::where('candidate_id', '=', Auth::id())->first();
        $cv_id = null;
        $cv_list = [];

        // if not logged in
        if ($cv != null) {
            $cv_id = $cv->id;
            $job_cv_list = JobCV::where('cv_id', '=', $cv_id)->get();

            if (count($job_cv_list) > 0) { // has he applied?
                foreach (Jobdetails::where('category_id', '=', $category)->get() as $job) { // picking a jov from all job
                    $has_job_cv = false;
                    foreach ($job_cv_list as $job_cv) { // jobs he applied for and picking one
                        // checking if job_cv id and job_id is same.
                        if ($job->id == $job_cv->job_id) $has_job_cv = true;
                    }
                    if (!$has_job_cv) $jobs->push($job); //if job_id does not match any job_cv, push to jobs collection.
                }
            } else Jobdetails::where('category_id', '=', $category)->get();
            return view('front-end.category', ['jobs' => $jobs]);
        } // of logged in

        $jobs = Jobdetails::where('category_id', '=', $category)->get();
        return view('front-end.category', ['jobs' => $jobs]);
    }
}
