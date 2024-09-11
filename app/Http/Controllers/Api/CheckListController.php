<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CheckList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checklists = CheckList::all();
        return response()->json([
            'data' => $checklists
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:check_lists',
        ]);

        $checklist = CheckList::create([
            'uuid' => Str::uuid(),
            'user_id' => $request->user()->id,
            'name' => $request->name,
        ]);

        return response()->json([
            'data' => $checklist
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
    public function destroy(CheckList $checklist)
    {
        $checklist->delete();
        return response()->json([
            'message' => 'Checklist deleted successfully'
        ], 200);
    }
}
