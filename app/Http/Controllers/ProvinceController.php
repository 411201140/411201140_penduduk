<?php

namespace App\Http\Controllers;

use App\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index()
    {
        $provinces = Province::all();

        return response()->json($provinces);
    }

    public function store(Request $request)
    {
        $province = Province::create($request->all());

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

        $province->update($request->all());

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
}
