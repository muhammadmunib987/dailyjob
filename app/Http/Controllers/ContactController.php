<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Anhskohbo\NoCaptcha\Facades\NoCaptcha;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::orderBy('id', 'desc')->paginate(10); // Pagination applied
        return view('dashboard', compact('contacts'));
    }
    public function contactUs(){
        $metaData=[
            'meta_title' => 'Find the Latest Jobs in Pakistan - DailyJobs',
            'meta_description' => 'Browse the latest job listings in Pakistan across multiple industries. Apply now and get hired!',
            'meta_keywords' => 'jobs in Pakistan, government jobs, private sector jobs, careers',
        ];
        return view('frontend.contact_us',compact('metaData'));
    }
    public function submitContactUs(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);
    
        // Store the contact form data in the database
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
    
        return redirect()->back()->with('success', 'Your message has been received. We will contact you soon.');
    }
    
}
