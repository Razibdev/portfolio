<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class AuthorController extends Controller
{
    public function addTeam(Request $request)
    {
        Session::put('page', 'add_team');
        if ($request->isMethod('post')) {
            $data = $request->all();
            // Category validation
            $rules = [
                'name' => 'required|regex:/(^([a-zA-z -]+)(\d+)?$)/u',
                'designation' => 'required',
                'image' => 'required',
                'description' => 'required',

            ];
            $customMessage = [
                'project_title.required' => 'Project title is required',
                'project_title.regex' => 'Valid Project Title is required',
                'designation.required' => 'Designation is required',
                'image.required' => 'Image is required',
                'description.required' => 'Description is required',

            ];

            $this->validate($request, $rules, $customMessage);

            if(empty($data['fb_url'])){
                $data['fb_url'] = '';
            }

            if(empty($data['skype_url'])){
                $data['skype_url'] = '';
            }

            if(empty($data['twitter_url'])){
                $data['twitter_url'] = '';
            }

            //Upload Image
            if ($request->hasFile('image')) {
                $image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999) . '.' . $extension;
                    $large_image_path = "image/team_image/" . $filename;
                    // Resize Image
                    Image::make($image_tmp)->resize(360, 280)->save($large_image_path);
                }
            }

            $team = new Author;
            $team->name = $data['name'];
            $team->designation = $data['designation'];
            $team->description = $data['description'];
            $team->image = $filename;
            $team->fb_url = $data['fb_url'];
            $team->skype_url = $data['skype_url'];
            $team->twitter_url = $data['twitter_url'];
            $team->save();
            Toastr::success('Team Member  has been added successfully', 'success');
            return redirect('/admin/view-team');
        }
        return view('admin.team.add_team');
    }


    public function editTeam(Request $request, $id=null){
        $teamDetails = Author::where('id', $id)->first();
        if($request->isMethod('post')){
            $data = $request->all();

            // Category validation
            $rules = [
                'name' => 'required|regex:/(^([a-zA-z -]+)(\d+)?$)/u',
                'designation' => 'required',
                'description' => 'required',

            ];
            $customMessage = [
                'project_title.required' => 'Project title is required',
                'project_title.regex' => 'Valid Project Title is required',
                'designation.required' => 'Designation is required',
                'image.required' => 'Image is required',
                'description.required' => 'Description is required',

            ];

            $this->validate($request, $rules, $customMessage);

            if(empty($data['fb_url'])){
                $data['fb_url'] = '';
            }

            if(empty($data['skype_url'])){
                $data['skype_url'] = '';
            }

            if(empty($data['twitter_url'])){
                $data['twitter_url'] = '';
            }

            if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999).'.'.$extension;

                }
                if (isset($teamDetails->image)){
                    $team_image_path = "image/team_image/".$teamDetails->image;
                    if(File::exists($team_image_path)) {
                        File::delete($team_image_path);
                    }
                }
                $team_image_path = "image/team_image/".$filename;
                // Resize Image
                Image::make($image_tmp)->resize(360, 280)->save($team_image_path);

            }else{
                $filename = $data['current_image'];
            }

            Author::where(['id' => $id])->update(['name' => $data['name'], 'designation' => $data['designation'], 'description' => $data['description'], 'fb_url' => $data['fb_url'], 'skype_url' => $data['skype_url'], 'twitter_url' => $data['twitter_url'], 'image' => $filename]);
            Toastr::success('Team Member has been updated successfully', 'Success');
            return redirect('/admin/view-team');

        }

        return view('admin.team.edit_team', compact('teamDetails'));
    }


    public function viewTeam()
    {
        Session::put('page', 'team_view');
        $teams = Author::get();
        $teams = json_decode(json_encode($teams));
//       echo "<pre>"; print_r($products); die;
        return view('admin.team.view_team', compact('teams'));
    }


    public function updateTeamStatus(Request $request){
        $team = Author::findOrFail($request->team_id);
        $team->status = $request->status;
        $team->save();
        return response()->json([
            'message' => 'Project Status Updated Successfully !'
        ]);
    }

    public function deleteTeam($id){
            $delete_team = Author::where('id', $id)->first();
//       $delete_category = json_decode(json_encode($delete_product));
//       echo '<pre>'; print_r($delete_category); die();

            if (isset($delete_team->image)) {
                $team_image_path = "image/team_image/" . $delete_team->image;

                if (File::exists($team_image_path)) {
                    File::delete($team_image_path);
                }

            }
        $delete_team->delete();
            Toastr::success('Project has been deleted', 'Success');
            return redirect('/admin/view-team');
        }





















}
