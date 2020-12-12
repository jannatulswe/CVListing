<?php

namespace App\Http\Controllers;

use App\CreateCV;
use App\Criteria;
use App\Education;
use App\Experience;
use App\JobCV;
use App\Jobdetails;
use App\JobsCriteria;
use App\ManageCv;
use App\Skill;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
   public function index(){

       $jobs = collect();
       $cv = CreateCV::where('candidate_id', '=', Auth::id())->first();
       $cv_id = null;
       $cv_list = [];

       if ($cv != null) $cv_id = $cv->id;

       $job_cv_list = JobCV::where('cv_id', '=', $cv_id )->get();
       if(count($job_cv_list) > 0 ){ // has he applied?
           foreach (Jobdetails::all() as $job){ // picking a jov from all job
               $has_job_cv = false;
               foreach ($job_cv_list as $job_cv){ // jobs he applied for and picking one
                   if ($job->id == $job_cv->job_id){ // checking if job_cv id and job_id is same.
                       $has_job_cv = true;
                   }

               }
              if (!$has_job_cv) $jobs->push($job); //if job_id does not match any job_cv, push to jobs collection.
           }
       }else $jobs = Jobdetails::all();
       return view('front-end.home.home', ['jobs_list' => $jobs]);
   }

   // showing login page.
    public function loginPage(){
        return view('front-end.login.login');
    }

    //applying for a job.
    public function apply($job_id){
        try {
            $cv_id = ManageCv::where('candidate_id', '=', Auth::id())->first();
            $job_cv = new JobCV();
            $job_cv->job_id = $job_id;
            $job_cv->cv_id = $cv_id->id;
            $job_cv->cv_weight = $this->weightCV($cv_id, JobsCriteria::where('job_detail_id', '=', $job_id)->get()); //calling a function
            if ($job_cv->save()){
                return redirect()->back()->with(['Application Successful!']);
            }
            return redirect()->back()->withErrors(['Dhur Mia, Problem Hoise.']);
        }catch (\Exception $e){
            return redirect()->back();
        }
     }

     //returning weighted value. passing cv and job_criteria.
     public function weightCV($cv, $job_criteria){
            $weighted_value = 0;
            //looping criteria to function one by one
         foreach ($job_criteria as $criteria) {

             if (trim(strtolower($criteria->criteria_type)) == 'experience' ){

                 $conditions = [ 'year_of_experience' => Criteria::find($criteria->criteria_id)->criteria_name, 'cv_id' => $cv->id ];
                 $experience = Experience::where($conditions)->first();
                 if($experience) $weighted_value = $weighted_value + $criteria->evaluation_point;

             }
             if (trim(strtolower($criteria->criteria_type)) == 'education'){

                 $conditions = [ 'title' => Criteria::find($criteria->criteria_id)->criteria_name, 'cv_id' => $cv->id ];
                 $education = Education::where($conditions)->first();
                 if($education) $weighted_value = $weighted_value + $criteria->evaluation_point;

             }
             if (trim(strtolower($criteria->criteria_type)) == 'skill'){

                 $conditions = [ 'title' => Criteria::find($criteria->criteria_id)->criteria_name, 'cv_id' => $cv->id ];
                 $skill = Skill::where($conditions)->first();
                 if($skill) $weighted_value = $weighted_value + $criteria->evaluation_point;

             }

            }
        return $weighted_value;
     }
}
