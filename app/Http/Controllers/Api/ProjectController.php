<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {

        $projects = Project::with('technologies','type')->paginate(4);  //con le pagine
        // $projects = Project::with('technologies', 'type')->get();
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show($slug)
    {

        $project = Project::where('slug', $slug)->with(['technologies', 'type'])->first();

        if ($project) {
            return response()->json([
                'success' => true,
                'project' => $project
            ]);
        } else {

            return response()->json([
                'success' => false,
                'error' => 'Progetto non trovato!'
            ]);
        }
    }
}
