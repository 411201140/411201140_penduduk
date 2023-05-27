<?php

namespace App\Http\Controllers;

use App\Resident;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ResidentController extends Controller
{
    public function index()
    {
        $residents = Resident::all();

        return response()->json($residents);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|unique:residents',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required|date',
            'umur_bulan' => 'nullable|integer',
            'propinsi_id' => 'required',
            'kota_id' => 'required',
            'alamat_pasien' => 'nullable',
            'rt' => 'nullable|integer',
            'rw' => 'nullable|integer',
        ]);

        $resident = Resident::create($validatedData);

        return response()->json($resident, 201);
    }

    public function show($id)
    {
        $resident = Resident::find($id);

        if (!$resident) {
            return response()->json(['message' => 'Resident not found'], 404);
        }

        return response()->json($resident);
    }

    public function update(Request $request, $id)
    {
        $resident = Resident::find($id);

        if (!$resident) {
            return response()->json(['message' => 'Resident not found'], 404);
        }

        $validatedData = $request->validate([
            'nik' => ['required', Rule::unique('residents')->ignore($resident->id)],
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required|date',
            'umur_bulan' => 'nullable|integer',
            'propinsi_id' => 'required',
            'kota_id' => 'required',
            'alamat_pasien' => 'nullable',
            'rt' => 'nullable|integer',
            'rw' => 'nullable|integer',
        ]);

        $resident->update($validatedData);

        return response()->json($resident);
    }

    public function destroy($id)
    {
        $resident = Resident::find($id);

        if (!$resident) {
            return response()->json(['message' => 'Resident not found'], 404);
        }

        $resident->delete();

        return response()->json(['message' => 'Resident deleted']);
    }

    public function countAll()
    {
        $count = Resident::count();
        return response()->json(['count' => $count]);
    }
}