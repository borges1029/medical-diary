<?php

namespace App\Http\Controllers;

use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    // Lista todos os tipos de serviço
    public function index()
    {
        return ServiceType::all();
    }

    // Cria um novo tipo de serviço
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);

        return ServiceType::create($request->all());
    }

    // Mostra um tipo de serviço específico
    public function show($id)
    {
        return ServiceType::findOrFail($id);
    }

    // Atualiza um tipo de serviço existente
    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|max:255']);

        $serviceType = ServiceType::findOrFail($id);
        $serviceType->update($request->all());

        return $serviceType;
    }

    // Remove um tipo de serviço
    public function destroy($id)
    {
        $serviceType = ServiceType::findOrFail($id);
        $serviceType->delete();

        return response()->noContent();
    }
}
