<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSurvey;
use App\Models\Post;

class SurveyController extends Controller
{
   
    public function showForm()
    {
        return view('survey_form');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user_surveys,email',
            'phone' => 'nullable|digits:10',
            'gender' => 'required|in:Male,Female,Other',
            'hobbies' => 'required|array|min:1',
            'user_type' => 'required|in:Student,Job Holder,Other',
            'field_of_study' => 'required_if:user_type,Student',
            'job_field' => 'required_if:user_type,Job Holder',
            'other_details' => 'required_if:user_type,Other',
            'country_crisis_opinion' => 'nullable|string|max:500',
        ]);

        UserSurvey::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'hobbies' => json_encode($request->hobbies),
            'user_type' => $request->user_type,
            'field_of_study' => $request->field_of_study,
            'job_field' => $request->job_field,
            'other_details' => $request->other_details,
            'country_crisis_opinion' => $request->country_crisis_opinion,
        ]);

        return redirect()->back()->with('success', 'Thank you for submitting the survey!');
    }
}
