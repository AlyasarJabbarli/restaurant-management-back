<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    //
    public function index()
    {
        return Restaurant::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:restaurants',
        ]);

        $restaurant = Restaurant::create($request->all());

        return response()->json($restaurant, 201);
    }

    public function show(Restaurant $restaurant)
    {
        return $restaurant;
    }

    public function update(Request $request, Restaurant $restaurant)
    {
        $restaurant->update($request->all());

        return response()->json($restaurant, 200);
    }

    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        return response()->json(null, 204);
    }
}
