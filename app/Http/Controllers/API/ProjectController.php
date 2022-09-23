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

        if (Project::all()->count() > 0) {
            $projectId = Project::latest()->first()->id;
        } else {
            $projectId = 0;
        }
        $name = $request->input('name');
        $slug = Str::slug($name, '-') . '-' . $projectId + 1;
        $categoryId=$request->input('categoryId');
        $discription=$request->input('discription');
        $initial_date=$request->input('init_date');
        $completion_date=$request->input('completion_date');
        $links=$request->input('links');
        $project_image=$request->file('project_image');

        $response=Cloudinary::upload($project_image->getRealPath())->getSecurePath();
    }
}
