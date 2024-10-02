<?php

namespace App\Http\Controllers;

use App\Models\AvailableDate;
use Illuminate\Http\Request;

class AvailableDateController extends Controller
{
    // Lista todas as datas disponíveis
    public function index()
    {
        return AvailableDate::with('doctor')->get();
    }

    // Cria uma nova data disponível
    public function store(Request $request)
    {
        // Validar a requisição
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        // Criar a nova data disponível
        $availableDate = AvailableDate::create($request->all());

        // Retornar a nova data disponível como resposta JSON
        return response()->json($availableDate, 201);
    }



    // Mostra uma data disponível específica
    public function show($id)
    {
        return AvailableDate::with('doctor')->findOrFail($id);
    }

    // Atualiza uma data disponível existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        $availableDate = AvailableDate::findOrFail($id);
        $availableDate->update($request->all());

        return $availableDate;
    }

    // Remove uma data disponível
    public function destroy($id)
    {
        $availableDate = AvailableDate::findOrFail($id);
        $availableDate->delete();

        return response()->noContent();
    }
}
