<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Project;
use App\Models\ProjectType;
//import facade Validator
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProjectTypeApiController extends Controller
{
    public function index()
    {
        //get all projects
        $projectTypes = ProjectType::latest()->paginate(5);

        //return collection of posts as a resource
        return new PostResource(true, 'List Data ProjectTypes', $projectTypes);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'type'     => 'required',
            'description'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        // $file = $request->file('image');
        // $path = $file->storeAs('project-images', $file->hashName(), 'public');

        //create post
        $post = ProjectType::create([
            'type'     => $request->type,
            'description'   => $request->description,
        ]);

        //return response
        return new PostResource(true, 'Data Project Type Berhasil Ditambahkan!', $post);
    }

}