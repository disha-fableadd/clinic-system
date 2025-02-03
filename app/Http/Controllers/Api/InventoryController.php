<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Supplier;
use Illuminate\Support\Facades\Validator;

class InventoryController extends Controller
{
    /**
     * Get all inventory items.
     */
    public function index()
    {
        $inventory = Inventory::all();
        return response()->json($inventory, 200);
    }

    /**
     * Store a new inventory item.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_name' => 'required|string',
            'category' => 'required|string',
            'quantity' => 'required|integer',
            'supplier_id' => 'required|exists:suppliers,id',
            'purchase_date' => 'required|date',
            'expiry_date' => 'required|date',
            'status' => 'required|in:active,inactive,expired',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $inventory = Inventory::create([
            'item_name' => $request->item_name,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'supplier_id' => $request->supplier_id,
            'purchase_date' => $request->purchase_date,
            'expiry_date' => $request->expiry_date,
            'status' => $request->status,
        ]);

        return response()->json([
            'message' => 'Inventory item created successfully',
            'inventory' => $inventory
        ], 201);
    }

    /**
     * Get a single inventory item by ID.
     */
    public function show($id)
    {
        $inventory = Inventory::findOrFail($id);
        return response()->json($inventory, 200);
    }

    /**
     * Update an existing inventory item.
     */
    public function update(Request $request, $id)
    {
        $inventory = Inventory::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'item_name' => 'required|string',
            'category' => 'required|string',
            'quantity' => 'required|integer',
            'supplier_id' => 'required|exists:suppliers,id',
            'purchase_date' => 'required|date',
            'expiry_date' => 'required|date',
            'status' => 'required|in:active,inactive,expired',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $inventory->update([
            'item_name' => $request->item_name,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'supplier_id' => $request->supplier_id,
            'purchase_date' => $request->purchase_date,
            'expiry_date' => $request->expiry_date,
            'status' => $request->status,
        ]);

        return response()->json([
            'message' => 'Inventory item updated successfully',
            'inventory' => $inventory
        ], 200);
    }

    /**
     * Delete an inventory item.
     */
    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();

        return response()->json(['message' => 'Inventory item deleted successfully'], 200);
    }
}
