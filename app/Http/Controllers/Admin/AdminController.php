<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.admin_dashboard');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];

            $customerMessage = [
                'email.required' => 'Email is required',
                'email.email' => 'Valid email is required',
                'password.required' => 'Password is required'

            ];
            $this->validate($request, $rules, $customerMessage);

            if(Auth::guard('admin')->attempt(['email' => $data["email"], 'password' => $data['password']])){

                return redirect('admin/dashboard');
            }else{
                return redirect()->back();
            }
        }
        return view('admin.admin_login');
    }



    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

    public function settings(){
        Session::put('page', 'settings');
        $adminDetails = Auth::guard('admin')->user();
        return view('admin.admin_settings', compact('adminDetails'));
    }


    public function checkCurrentPassword(Request $request){
        $data = $request->all();
//        echo "<pre>"; print_r($data);
//        echo "<pre>"; print_r(Auth::guard('admin')->user()->password); die;

        if(Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)){
            echo "true";
        }else{
            echo "false";
        }

    }


    public function updateCurrentPassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
//            echo "<pre>"; print_r($data); die;
            if (Hash::check($data["current_pwd"], Auth::guard('admin')->user()->password)) {
                // check if new and confirm password is matching
                if ($data['new_pwd'] === $data['confirm_pwd']) {
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['new_pwd'])]);
                    Toastr::success('Password has been changed successfully!', 'success');
                    return redirect('admin/settings');
                } else {
                    Toastr::error('new and confirm password is not matching', 'error');
                    return redirect('admin/settings');
                }
            } else {
                Toastr::error('Your Current Password is Incorrect', 'error');
                return redirect('admin/settings');
            }
        }
    }


    public function updateAdminDetails(Request $request){
        Session::put('page', 'update-admin-details');

        $adminDetails = Auth::guard('admin')->user();
        if($request->isMethod('post')){
            $data = $request->all();
//            echo "<pre>"; print_r($data); die;
            $rules = [
                'admin_name'   => 'required|regex:/(^([a-zA-z ]+)(\d+)?$)/u',
                'admin_mobile' => 'required|numeric',
                'admin_image'  => 'image|mimes:jpeg,jpg,png'
            ];
            $customMessage = [
                'admin_name.required' => 'Name is required',
                'admin_name.alpha'    => 'Valid Name is required',
                'admin_mobile.required' => 'Mobile is required',
                'admin_mobile.numeric'    => 'Valid Mobile is required',
                'admin_image.image'    => 'Valid image is required'


            ];
            $this->validate($request, $rules, $customMessage);
            // Update Admin Details
            // image filed
            if($request->hasFile('admin_image')){
                $image_tmp = $request->file('admin_image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Generate New Image Name
                    $imageName = rand(1111,9999).'.'.$extension;
                }

                if (isset($adminDetails->image)){
                    $image_path = "image/admin_images/admin_photos/".$adminDetails->image;  // Value is not URL but directory file path
                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                // Upload Image
                $imagePath = 'image/admin_images/admin_photos/'.$imageName;
                Image::make($image_tmp)->resize('400', '300')->save($imagePath);
            }else{
                $imageName = $adminDetails->image;
            }

            // Update Admin Details
            Admin::where('email', Auth::guard('admin')->user()->email)->update(['name' => $data['admin_name'], 'image' => $imageName, 'mobile' => $data['admin_mobile']]);
            Toastr::success('Admin Details has been updated', 'success');
            return redirect()->back();

        }
        return view('admin.update_admin_details', compact('adminDetails'));
    }




















}
