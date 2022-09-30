<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class ProjectController extends Controller
{

    public function getProjects()
    {
        $projects = Project::all();
        $project=Project::first();
        $project->visitsCounter()->increment();

        return response()->json([
            'status' => 200,
            'projects' => $projects
        ]);
    }
    public function index()
    {
        $projects = Project::all();
        $project=Project::first();
        $visits = $project->visitsCounter()->count();
        $api = Cloudinary::admin();
        $total = $projects->count();
        $cgi = $projects->where('category_id', '1')->count();
        $print = $projects->where('category_id', '2')->count();
        $favorites=$projects->where('favorite','1')->count();
        $renders = $api->assets(
            ["resource_type" => "image", "type" => "upload", "max_results" => 500]
        );


        return response()->json([
            'status' => 200,
            'total' => $total,
            'cgi' => $cgi,
            'print' => $print,
            'renders' => $renders,
            'visits' => $visits,
            'favorites'=>$favorites
        ]);
    }

    public function store(Request $request)
    {
        set_time_limit(0);
        $project = new Project;

        $request->validate([
            'name' => 'required',
            'categoryId' => 'required',
            'discription' => 'required',
            'init_date' => 'required',
            'completion_date' => 'required',
            'images' => 'required'
        ]);

        if (Project::all()->count() > 0) {
            $projectId = Project::latest()->first()->id;
        } else {
            $projectId = 0;
        }

        $project->name = $request->input('name');
        $project->slug = Str::slug($request->input('name'), '-') . '-' . $projectId + 1;
        $project->category_id = $request->input('categoryId');
        $project->discription = $request->input('discription');
        $project->initial_date = $request->input('init_date');
        $project->completion_date = $request->input('completion_date');
        $project->links = "";
        $prevFiles = "";

        if ($request->has('images')) {
            foreach ($request->file('images') as $imageFile) {
                $uploadedImageUrl = Cloudinary::upload($imageFile->getRealPath())->getSecurePath();
                $project->images = $prevFiles . $uploadedImageUrl . ',';
                $prevFiles = $prevFiles . $uploadedImageUrl . ",";
            }
        }
        $allImages = explode(",", $prevFiles);
        $project->project_image = $allImages[0];

        $project->save();

        return response()->json([
            'status' => 200,
            'message' => 'Project uploaded!'
        ]);
    }
}
