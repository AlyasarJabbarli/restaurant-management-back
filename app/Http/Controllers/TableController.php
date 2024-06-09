<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;

class TableController extends Controller
{
    //
    public function index()
    {
        return Table::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'restaurant_id' => 'required|exists:restaurants,id',
        ]);

        $table = Table::create($request->all());

        return response()->json($table, 201);
    }

    public function show(Table $table)
    {
        return $table;
    }

    public function update(Request $request, Table $table)
    {
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'category_id' => 'sometimes|exists:categories,id',
            'restaurant_id' => 'sometimes|exists:restaurants,id',
        ]);

        $table->update($request->all());

        return response()->json($table, 200);
    }

    public function destroy(Table $table)
    {
        $table->delete();

        return response()->json(null, 204);
    }
}
