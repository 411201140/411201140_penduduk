<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();

        return response()->json($cities);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'province_id' => 'required|exists:provinces,id',
            'name' => 'required|unique:cities',
        ]);

        $city = City::create($validatedData);

        return response()->json($city, 201);
    }

    public function show($id)
    {
        $city = City::find($id);

        if (!$city) {
            return response()->json(['message' => 'City not found'], 404);
        }

        return response()->json($city);
    }

    public function update(Request $request, $id)
    {
        $city = City::find($id);

        if (!$city) {
            return response()->json(['message' => 'City not found'], 404);
        }

        $validatedData = $request->validate([
            'province_id' => 'required|exists:provinces,id',
            'name' => ['required', Rule::unique('cities')->ignore($city->id)],
        ]);

        $city->update($validatedData);

        return response()->json($city);
    }

    public function destroy($id)
    {
        $city = City::find($id);

        if (!$city) {
            return response()->json(['message' => 'City not found'], 404);
        }

        $city->delete();

        return response()->json(['message' => 'City deleted']);
    }
    
    public function countAll()
    {
        $count = City::count();
        return response()->json(['count' => $count]);
    }
}