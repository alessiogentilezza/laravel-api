<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        // $project = Project::with(['technology', 'type'])->paginate(4); //->get();
        $project = Project::with(['type'])->paginate(4); //->get();

        return response()->json([
            'success' => true,
            'results' => $project
        ]);

    }
}
