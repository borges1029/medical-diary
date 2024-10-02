<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    // Listar todos os médicos
    public function index()
    {
        return Doctor::all();
    }

    // Criar um novo médico
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'service_type_id' => 'required|exists:service_types,id',
        ]);

        $doctor = Doctor::create($request->all());

        return response()->json($doctor, 201);
    }

    // Mostrar um médico específico
    public function show($id)
    {
        $doctor = Doctor::with(['serviceType', 'availableDates'])->findOrFail($id);
        return response()->json($doctor);
    }

    // Atualizar um médico
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'service_type_id' => 'sometimes|required|exists:service_types,id',
        ]);

        $doctor = Doctor::findOrFail($id);
        $doctor->update($request->all());

        return response()->json($doctor);
    }

    // Remover um médico
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return response()->json(null, 204);
    }
}
