<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProjectController extends Controller
{
    public function store(Request $request)
    {
        $project = new Project;

        $request->validate([
            'name' => 'required',
            'categoryId' => 'required',
            'discription' => 'required',
            'init_date' => 'required',
            'completion_date' => 'required',
            'project_image' => 'required',
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

        // $project->project_image = Cloudinary::upload($request->file('project_image')->getRealPath())->getSecurePath();
        foreach ($request->file('images') as $imageFile) 
        {
            $uploadedImageUrl = Cloudinary::upload($imageFile->getRealPath())->getSecurePath();
            $project->images = $project->images + $uploadedImageUrl + ',';
        }

        $project->save();
        
        return response()->json([
            'status'=>200,
            'message'=>'Project uploaded!'
        ]);
    }
}
