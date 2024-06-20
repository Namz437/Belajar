<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProjectType;
use Exception;
use Illuminate\Http\Validator;
class ProjectTypeController extends Controller
{
    public function index()
    {
        $project_types = ProjectType::all();
        return view('admin.project-type.index', compact('project_types'));
    }

    public function create()
    {
        return view('admin.project-type.create');
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'type' => 'string|max:255|required',
                'description' => 'nullable'
            ]);
            
            // Insert to Database
            $project_type = new ProjectType();
            $project_type->type= $request->type;
            $project_type->description = $request->description;
            $project_type->save();

            return redirect()->route('admin.project-types.index');
        } catch (Exception $e) {
            dd($e);
            return back()->withErrors($e->getMessage())->withInput();
        }
    }
    public function destroy($id)
    {
        // Logika get data
        // 'SELECT' from project_types WHERE id = $id
        $project_type = ProjectType::find($id);

        // Pengecekan project type data ada / tidal
        if(empty($project_type))
        {
            return redirect()->route('admin.project-types.index')->with('error', 'Project Type not found');
        }

        //Logika hapus data
        // 'DELETE' From project_types Where id = $id
        $project_type->delete();

        return redirect()->route('admin.project-types.index')->with('success', 'Project Type ID ' . $id . ' successfully ');

    }
    public function edit($id)
    {
        // Logika get data
        $pt = ProjectType::find($id);

        // Pengecekan project type ada / tidak ketika redirect je halaman index
        // dan kasih pesan project type not found
        if(empty($pt))
        {
            // abort(404);
             return redirect()->route('admin.project-types.index')->with('error', 'Project Type not found');
        }
        // Logika nampilin data kirim ke view
        return view('admin.project-type.edit', compact('pt'));
    }
    public function update($id, Request $request)
    {
        // Logika get data
        $pt = ProjectType::find($id);

         // Pengecekan project type ada / tidak ketika redirect je halaman index
        // dan kasih pesan project type not found
        if(empty($pt))
        {
            // abort(404);
             return redirect()->route('admin.project-types.index')->with('error', 'Project Type not found');
        }
        
        $pt->type = $request->type;
        $pt->description = $request->description;
        $pt->save();
        
        return redirect()->route('admin.project-types.index')->with('success', 'Project Type successfully update');
        
    }
}
