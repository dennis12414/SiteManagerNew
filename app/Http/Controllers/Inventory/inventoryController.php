<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class inventoryController extends Controller
{
    // Display a listing of the resource for a specific project
    public function index($projectId)
    {
        $inventoryItems = Inventory::where('projectId', $projectId)->get();
        return response(["items"=>$inventoryItems], 200);
    }

    // Display the specified resource
    public function show($projectId, $inventoryId)
    {
        $inventoryItem = Inventory::where('projectId', $projectId)->where('inventoryId', $inventoryId)->first();

        if (!$inventoryItem) {
            return response()->json(['message' => 'Inventory item not found'], 404);
        }

        return response()->json($inventoryItem, 200);
    }

    // Store a newly created resource in storage
    public function store(Request $request, $projectId)
    {
        $validator = $request->validate( [
            'item' => 'required|string|max:255',
            'description' => 'nullable|string',
            'stock' => 'required|integer'
        ]);

//        if ($validator->fails()) {
//            return response()->json($validator->errors(), 422);
//        }

        $inventoryItem = Inventory::create([
            'projectId' => $projectId,
            'item' => $request->item,
            'description' => $request->description,
            'stock' => $request->stock
        ]);
        $inventoryItem->refresh();
        return response()->json($inventoryItem, 201);
    }

    // Update the specified resource in storage
    public function update(Request $request, $projectId, $inventoryId)
    {
        $inventoryItem = Inventory::where('projectId', $projectId)->where('inventoryId', $inventoryId)->first();

        if (!$inventoryItem) {
            return response()->json(['message' => 'Inventory item not found'], 404);
        }

        $validator = $request->validate( [
            'item' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'stock' => 'sometimes|required|integer'
        ]);

//        if ($validator->fails()) {
//            return response()->json($validator->errors(), 422);
//        }

        $inventoryItem->update($request->all());

        return response()->json($inventoryItem, 200);
    }
}
