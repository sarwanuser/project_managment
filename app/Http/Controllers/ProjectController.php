<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Images;
use Exception;
use DB;

class ProjectController extends Controller
{   
    // for view page for all proects
    public function index(){
        $projects = Project::orderby('created_at', 'DESC')->get();
        return view('Projects.index', compact('projects'));
    }

    // for view page for create proects
    public function create(){
        return view('Projects.create');
    }


    // for store projects details
    public function store(Request $request){
        try {
            // dd($request->all());
            // Begin a transaction
            DB::beginTransaction();

            // checking for file exention
            if ($request->hasFile('main_image')) {
                $mainfile   = $request->file('main_image');
                $allowedExt = ['jpg', 'JPG', 'png', 'PNG'];
                $ext        = $mainfile->getClientOriginalExtension();
                $check      = in_array($ext, $allowedExt);

                if ($check) {
                    $mainfileName = time() . $mainfile->getClientOriginalName();
                }
                else {
                    return response()->json(['status'=>'0', 'msg' =>"Please select only JPG or PNG formate for Main Image"]);
                }
            }

            $data = new Project();
            $data->name             =   $request->name;
            $data->technology       =   $request->technology;
            $data->role             =   $request->role;
            $data->start_date       =   $request->start_date;
            $data->duration         =   $request->duration;
            $data->description      =   $request->description;
            $data->main_image       =   $mainfileName;
            $data->save();
            
            // code for Sub Titles and images 
            if (isset($request->pr_sub_title)) {
                $count = count($request->pr_sub_title);
                // dd($count);
                if($count > 0)
                {   
                    // checking for file exention
                    for ($x = 1; $x <= $count; $x++)
                    {
                        if ($request->hasFile('pr_sub_image.'.$x)) {
                            $file       = $request->file('pr_sub_image.'.$x);
                            $allowedExt = ['jpg', 'JPG', 'png', 'PNG'];
                            $ext        = $file->getClientOriginalExtension();
                            $check      = in_array($ext, $allowedExt);

                            if (!$check) {
                                return response()->json(['status'=>'0', 'msg' =>"Please select only JPG or PNG formate for images for Sub ID- $x"]);
                            }
                        }
                    }

                    // Save projects sub details
                    for ($x = 0; $x < $count; $x++)
                    {   
                        $sub = new Images();

                        if ($request->hasFile('pr_sub_image.'.$x)) {
                            $file       = $request->file('pr_sub_image.'.$x);
                            $fileName   = time() . $file->getClientOriginalName();
                            $file->move(public_path('images/projects/subimg'), $fileName);
                        }

                        $sub->projects_details_id  = $data->id;
                        $sub->pr_sub_title         = $request->pr_sub_title[$x];
                        $sub->pr_sub_image         = $fileName;
                        $sub->save();
                    }
                }
            }

            $mainfile->move(public_path('images/projects'), $mainfileName);
            // Commit the transaction
            DB::commit();
            return response()->json(['status'=>'1', 'msg' =>"Project Added Successfully !", 'data'=>$data]);
        } catch (\Exception $e) {
            // An error occured; cancel the transaction...
            DB::rollback();
            $msg = $e->getMessage();
            return response()->json(['status'=>'0', 'msg' =>"$msg", 'data'=>$data]);
        }
    } 


    public function show($id){
        $projects = Project::where('id', $id)->first();
        if ($projects) {
            $Images  = Images::where('projects_details_id', $id)->get();
            return view('Projects.show', compact('projects', 'Images'));
        }
        else{
            return redirect('/projects');
        }
    }
}
