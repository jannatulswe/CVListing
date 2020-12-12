<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Jobdetails;
use Illuminate\Http\Request;

class JobdetailsController extends Controller
{
    public function index(){
        $jobdetails = Jobdetails::all();
        $categories = Category::all();

        return view('admin.jobdetails.job-details',[
            'jobdetails' =>$jobdetails,
            'categories'=>$categories
        ]);
    }

     public function saveJobDetails(Request $request){

        $job_detail = new Jobdetails();

         $job_detail->job_title = $request->job_title;
         $job_detail->company_name = $request->company_name;
         $job_detail->vacancy = $request->vacancy;
         $job_detail->job_responsibilities = $request->job_responsibilities;
         $job_detail->employee_status = $request->employee_status;
         $job_detail->educational_requirement = $request->educational_requirement;
         $job_detail->experience_requirement = $request->experience_requirement;
         $job_detail->additional_requirement = $request->additional_requirement;
         $job_detail->job_location = $request->job_location;
         $job_detail->salary = $request->salary;
         $job_detail->category_id = $request->category_id;
         $job_detail->is_active = 1;
         if ($job_detail->save())
         return redirect()->back()->with('message','Job Details Added Successfully');

     }

    public function unPublishJobDetails($id){
        $job_details = Jobdetails::find($id);
        $job_details->is_active = 0;
        $job_details->save();

        return back();
    }
    public function publishJobDetails($id){
        $job_details = Jobdetails::find($id);
        $job_details->is_active = 1;
        $job_details->save();

        return back();
    }

    public function deleteJobDetails($id){
        $job_details = Jobdetails::find($id);
        try{
            $job_details->delete();
            return back()->with('message','Job Deleted Successfully');
        }catch (\Exception $e){
            return back()->with('message','Job Deletion is Not possible!');
        }

    }
    public function updateJobDetails(Request $request){
        $jobdetails = new Jobdetails();
        $jobdetails = Jobdetails::find($request->id);

        $jobdetails->job_title = $request->job_title;
        $jobdetails->company_name = $request->company_name;
        $jobdetails->vacancy = $request->vacancy;
        $jobdetails->job_responsibilities = $request->job_responsibilities;
        $jobdetails->employee_status = $request->employee_status;
        $jobdetails->educational_requirement = $request->educational_requirement;
        $jobdetails->experience_requirement = $request->experience_requirement;
        $jobdetails->additional_requirement = $request->additional_requirement;
        $jobdetails->job_location = $request->job_location;
        $jobdetails->salary = $request->salary;
        $jobdetails->category_id = $request->category_id;
//        $jobdetails->status = $request->status;
        $jobdetails->save();

        return redirect()->back()->with('message','Job Details updated Successfully');

    }




}
