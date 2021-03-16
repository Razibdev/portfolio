<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class ProjectsController extends Controller
{
    public function addProject(Request $request){
        Session::put('page', 'add_project');
        if($request->isMethod('post')){
            $data = $request->all();
            // Category validation
            $rules = [
                'project_title'   => 'required|regex:/(^([a-zA-z -]+)(\d+)?$)/u',
                'project_url' => 'required',
                'image' => 'required'
            ];
            $customMessage = [
                'project_title.required' => 'Project title is required',
                'project_title.regex'    => 'Valid Project Title is required',
                'project_url.required'    => 'Project url is required',
                'image.required'    => 'Image is required',
            ];
            $this->validate($request, $rules, $customMessage);

            //Upload Image
            if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999).'.'.$extension;
                    $large_image_path = "image/project_image/".$filename;
                    // Resize Image
                    Image::make($image_tmp)->resize(360, 280)->save($large_image_path);
                }
            }

            $project = new Project;
            $project->project_title = $data['project_title'];
            $project->project_url = $data['project_url'];
            $project->image = $filename;
            $project->save();
            Toastr::success('Project  has been added successfully', 'success');
            return redirect('/admin/view-projects');
        }
        return view('admin.projects.add_project');
    }


    public function editProject(Request $request, $id=null){
        $projectDetails = Project::where('id', $id)->first();
        if($request->isMethod('post')){
            $data = $request->all();

            // Category validation
            $rules = [
                'project_title'   => 'required|regex:/(^([a-zA-z -]+)(\d+)?$)/u',
                'project_url' => 'required'

            ];
            $customMessage = [
                'project_title.required' => 'Project title is required',
                'project_title.regex'    => 'Valid Project Title is required',
                'project_url.required'    => 'Project url is required'
            ];
            $this->validate($request, $rules, $customMessage);

            //Upload Image
            if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999).'.'.$extension;

                }
                if (isset($projectDetails->image)){
                    $project_image_path = "image/project_image/".$projectDetails->image;
                    if(File::exists($project_image_path)) {
                        File::delete($project_image_path);
                    }
                }
                $project_image_path = "image/project_image/".$filename;
                // Resize Image
                Image::make($image_tmp)->resize(360, 280)->save($project_image_path);

            }else{
                $filename = $data['current_image'];
            }

            Project::where(['id' => $id])->update(['project_title' => $data['project_title'], 'project_url' => $data['project_url'], 'image' => $filename]);
            Toastr::success('Project has been updated successfully', 'Success');
            return redirect('/admin/view-projects');

        }

        return view('admin.projects.edit_project', compact('projectDetails'));
    }


    public function viewProject(){
        Session::put('page', 'project_view');
        $projects = Project::get();
        $projects = json_decode(json_encode($projects));
//       echo "<pre>"; print_r($products); die;
        return view('admin.projects.view_projects', compact('projects'));
    }


    public function updateProjectStatus(Request $request){
        $project = Project::findOrFail($request->project_id);
        $project->status = $request->status;
        $project->save();
        return response()->json([
            'message' => 'Project Status Updated Successfully !'
        ]);
    }


    public function deleteProject($id){
        $delete_project = Project::where('id', $id)->first();
//       $delete_category = json_decode(json_encode($delete_product));
//       echo '<pre>'; print_r($delete_category); die();

        if (isset($delete_project->image)) {
            $project_image_path = "image/project_image/" . $delete_project->image;

            if (File::exists($project_image_path)) {
                File::delete($project_image_path);
            }

        }
        $delete_project->delete();
        Toastr::success('Project has been deleted', 'Success');
        return redirect('/admin/view-projects');
    }











}
