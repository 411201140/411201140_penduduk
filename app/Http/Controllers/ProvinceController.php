<?php

namespace App\Http\Controllers;

use App\Province;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProvinceController extends Controller
{
    public function index()
    {
        $provinces = Province::all();

        return response()->json($provinces);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:provinces',
        ]);

        $province = Province::create($validatedData);

        return response()->json($province, 201);
    }

    public function show($id)
    {
        $province = Province::find($id);

        if (!$province) {
            return response()->json(['message' => 'Province not found'], 404);
        }

        return response()->json($province);
    }

    public function update(Request $request, $id)
    {
        $province = Province::find($id);

        if (!$province) {
            return response()->json(['message' => 'Province not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => ['required', Rule::unique('provinces')->ignore($id)],
        ]);

        $province->update($validatedData);

        return response()->json($province);
    }

    public function destroy($id)
    {
        $province = Province::find($id);

        if (!$province) {
            return response()->json(['message' => 'Province not found'], 404);
        }

        $province->delete();

        return response()->json(['message' => 'Province deleted']);
    }

    public function countAll()
    {
        $count = Province::count();
        return response()->json(['count' => $count]);
    }
}
