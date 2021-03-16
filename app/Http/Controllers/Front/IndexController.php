<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Project;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function index(){
        $projectDetails = Project::where('status', 1)->orderBy('id', 'Desc')->get();
        $teams = Author::where('status', 1)->orderBy('id', 'Desc')->get();
        return view('index', compact('projectDetails', 'teams'));
    }


    // contact page method
    public function contact(Request $request){
        Session::put('page', 'page-contact');
        if($request->isMethod('post')){
            $data = $request->all();

            $validatedData = Validator::make( $request->all(),[
                'name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'email' => 'required|email',
                'message' => 'required'
            ]);

            if($validatedData->fails()){
                return redirect()->back()->withErrors($validatedData)->withInput();
            }

            // Send Contact Mail
            $email = "razibhossen8566@yopmail.com";
            $messageData = [
                'email' => $data['email'],
                'name'  => $data['name'],
                'comment' => $data['message']
            ];

            Mail::send('admin.emails.enquiry', $messageData, function ($message) use($email){
                $message->to($email)->subject('Enquiry from Websolves');
            });
            Toastr::success('Thanks for your enquiry. We will get back to you soon.', 'Contact Us');
            return redirect()->back();
        }

        return view('pages.contact', compact('categories', 'meta_title', 'meta_description', 'meta_keywords'));
    }






}
