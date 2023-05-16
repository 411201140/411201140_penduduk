<?php

namespace App\Http\Controllers;

use App\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index()
    {
        $penduduk = Penduduk::all();

        return response()->json($penduduk);
    }

    public function store(Request $request)
    {
        $penduduk = Penduduk::create($request->all());

        return response()->json($penduduk, 201);
    }

    public function show($id)
    {
        $penduduk = Penduduk::find($id);

        if (!$penduduk) {
            return response()->json(['message' => 'Penduduk not found'], 404);
        }

        return response()->json($penduduk);
    }

    public function update(Request $request, $id)
    {
        $penduduk = Penduduk::find($id);

        if (!$penduduk) {
            return response()->json(['message' => 'Penduduk not found'], 404);
        }
        $penduduk->update($request->all());

        return response()->json($penduduk);
    }

    public function destroy($id)
    {
        $penduduk = Penduduk::find($id);

        if (!$penduduk) {
            return response()->json(['message' => 'Penduduk not found'], 404);
        }

        $penduduk->delete();

        return response()->json(['message' => 'Penduduk deleted']);
    }
}
