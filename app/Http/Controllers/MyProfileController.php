<?php

namespace App\Http\Controllers;
use App\Candidate;
use App\CreateCV;
use App\Education;
use App\Experience;
use App\Http\Controllers\Controller;

use App\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyProfileController extends Controller
{
    // Show add CV form
    public function index(){
       if (CreateCV::where('candidate_id', '=', Auth::user()->id)->first())
           return redirect('/')->with('message','Already Have one.');

       return view('front-end.create-cv.create-cv');
   }

    // Save CV
    public function saveCvDetails(Request $request){

       if (CreateCV::where('candidate_id', '=', Auth::user()->id)->first())
           return redirect('/')->with('message','Already Have one.');

        $createCV = new CreateCV();
        $createCV->first_name   =   $request->first_name;
        $createCV->last_name    =   $request->last_name;
        $createCV->father_name  =   $request->father_name;
        $createCV->mother_name  =   $request->mother_name;
        $createCV->email        =   $request->email;
        $createCV->gender       =   $request->gender;
        $createCV->address      =   $request->address;
        $createCV->contact      =   $request->contact;
        $createCV->candidate_id =   Auth::user()->id;
        $createCV->save();

        return redirect()->back()->with('message',' Successfully');
    }

    // Showing some cv.
    public function showCv(){
        try {
            $cv = CreateCV::where('candidate_id', '=', Auth::user()->id)->first();
            $experience = Experience::where('cv_id', '=', $cv->id)->get();
            $education = Education::where('cv_id', '=', $cv->id)->get();
            $skills = Skill::where('cv_id', '=', $cv->id)->get();

            return view('front-end.create-cv.viewCv', ['cv' => $cv, 'experiences' => $experience, 'education' => $education, 'skills' => $skills]);
        }catch (\Exception $e) {
            return redirect()->back();
        }
    }

    // Adding Experience to CV.
    public function addExperience(Request $request){
       $experience = new Experience();
       $experience->position = $request->position;
       $experience->org_name = $request->org_name;
       $experience->year_of_experience = $request->year_of_experience;
       $experience->cv_id = $request->cv_id;
       if ($experience->save()){
           return redirect()->back()->with('message','Experience Added Successfully');
       }
    }

    public function removeExperience($id){
        if(Experience::find($id)->delete()){
            return redirect()->back()->with('msg', 'Valoi hoise!');
        }
    }

    public function addEducation(Request $request){
        $education = new Education();
        $education->title = $request->title;
        $education->academic_year = $request->academic_year;
        $education->result = $request->result;
        $education->cv_id = $request->cv_id;
        if ($education->save()){
            return redirect()->back()->with('message','Education Added Successfully');
        }
    }


    public function removeEducation($id){
        if(Education::find($id)->delete()){
            return redirect()->back()->with('msg', 'Valoi hoise!');
        }
    }
    public function addSkills(Request $request){
        $skills = new Skill();
        $skills->title = $request->title;
        $skills->cv_id = $request->cv_id;
        if ($skills->save()){
            return redirect()->back()->with('message','skills Added Successfully');
        }
    }


    public function removeSkills($id){
        if(Skill::find($id)->delete()){
            return redirect()->back()->with('msg', 'Valoi hoise!');
        }
    }


}
