<?php

namespace App\Http\Controllers\Admin;

use App\Criteria;
use App\Jobdetails;
use App\JobsCriteria;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class JobsCriteriaController extends Controller
{
    public function index(){
        $jobscriteria = JobsCriteria::all();
        return view('admin.jobs-criteria.jobs-criteria',[
            'jobs_criteria' =>$jobscriteria,
           ]);
    }

    public function saveJobsCriteria(Request $request){
        $jobs_criteria = new JobsCriteria();

        $job = Jobdetails::find($request->job_id);
        $criteria = new Criteria();
        $criteria->criteria_name = $request->criteria_name;
        $criteria->criteria_description = $request->criteria_description;
        if ($criteria->save() && $job != null ){
            $jobs_criteria->job_detail_id = $request->job_id;
            $jobs_criteria->criteria_id = $criteria->id;
            $jobs_criteria->evaluation_point = $request->criteria_point;
            $jobs_criteria->criteria_type = $request->criteria_type;
            if ($criteria->save() && $jobs_criteria->save()){
                return $this->showMessage('Jobs Criteria Added Successfully');
            }
        }
        return $this->showMessage('Sorry! Action is not Fully Functional.');
    }

    public function showMessage($message){
        return redirect()->back()->with('message', $message);
    }
}
