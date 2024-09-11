<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CheckListItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\FuncCall;

class CheckListItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Int $checklist)
    {
        $checklistItembyChecklist = CheckListItem::where('check_list_id', $checklist)->get();

        return response()->json([
            'data' => $checklistItembyChecklist
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Int $checklist)
    {
        $request->validate([
            'itemName' => 'required|string',
        ]);

        $checklistItem = CheckListItem::create([
            'uuid' => Str::uuid(),
            'check_list_id' => $checklist,
            'itemName' => $request->itemName,
        ]);

        return response()->json([
            'data' => $checklistItem
        ], 201);
    }

    public function getChecklistItemById(Int $checklistId, Int $checklistItemId)
    {
        $getChecklistItemById = CheckListItem::where('check_list_id', $checklistId)->where('id', $checklistItemId)->first();
        return response()->json([
            'data' => $getChecklistItemById
        ], 200);
    }

    public function updateChecklistItemById(Int $checklistId, Int $checklistItemId)
    {
        $getChecklistItemById = CheckListItem::where('check_list_id', $checklistId)->where('id', $checklistItemId)->first();

        if ($getChecklistItemById->status == 0) {
            $getChecklistItemById->update([
                'status' => 1
            ]);
        } else {
            $getChecklistItemById->update([
                'status' => 0
            ]);
        }

        return response()->json([
            'data' => $getChecklistItemById
        ], 200);
    }

    public function deleteChecklistItemById(Int $checklistId, Int $checklistItemId)
    {
        $getChecklistItemById = CheckListItem::where('check_list_id', $checklistId)->where('id', $checklistItemId)->first();
        $getChecklistItemById->delete();

        return response()->json([
            'message' => 'Checklist deleted successfully'
        ], 200);
    }

    public function renameChecklistItemById(Request $request, Int $checklistId, Int $checklistItemId)
    {
        $request->validate([
            'itemName' => 'required|string',
        ]);

        $getChecklistItemById = CheckListItem::where('check_list_id', $checklistId)->where('id', $checklistItemId)->first();
        $getChecklistItemById->update([
            'itemName' => $request->itemName
        ]);

        return response()->json([
            'data' => $getChecklistItemById
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
