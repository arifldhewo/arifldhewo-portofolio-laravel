<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(Project::all(), 200)->header('Content-Type', 'application/json');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'skills' => 'required',
            'title' => 'required',
            'description' => 'required',
            'source' => 'string'
        ]);

        $imgArray = [];
        $indexImg = 0;

        foreach($request->img_url as $img){
            $imgArray[$indexImg++] = $img->store('public/images');
        }

        $validated['img_url'] = collect($imgArray)->implode(',');

        Project::create($validated);
        
        return response()->json([
            'message' => "Submission successfully",
        ], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
